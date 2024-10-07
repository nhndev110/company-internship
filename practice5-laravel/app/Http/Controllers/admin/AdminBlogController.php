<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminBlogController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $articles = Article::with('category', 'author')->get();

    return response()->view('admin.pages.blog.index', ['articles' => $articles]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();
    $tags = Tag::all();
    return view('admin.pages.blog.create', ['categories' => $categories, 'tags' => $tags]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:100|min:5',
      'description' => 'required|string|max:500',
      'thumbnail' => 'required|image|mimes:png,jpg,webp,svg,jpeg|max:2048',
      'slug' => 'required|max:150|string',
      'status' => 'required|numeric',
      'content' => 'required|string',
      'tags' => 'required',
      'categoryId' => 'required|numeric|gt:0|exists:categories,id'
    ]);

    $userId = Auth::user()->id;

    $thumbnailPath = $request->file('thumbnail')->store('public/articles');

    $thumbnailName = substr($thumbnailPath, strlen("public/articles/"));

    $article = new Article;

    $article->title = $request->input('title');
    $article->description = $request->input('description');
    $article->thumbnail = $thumbnailName;
    $article->slug = $request->input('slug');
    $article->status = $request->input('status');
    $article->content = $request->input('content');
    $article->category_id = $request->input('categoryId');
    $article->author_id = $userId;

    $statusSave = $article->save();

    $articleTags = json_decode($request->tags);

    $article->tags()->attach($articleTags);

    if (!$statusSave) {
      return response()->json(['status' => 'fail']);
    }

    if ($article->status == 1) {
      return response()->json([
        'msg' => 'The article has been successfully published!',
        'status' => 'success'
      ]);
    } else if ($article->status == 0) {
      return response()->json([
        'msg' => 'The article has been successfully saved as a draft!',
        'status' => 'success'
      ]);
    } else {
      return response()->json([
        'msg' => 'Status does not exist.',
        'status' => 'fail'
      ]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  public function showThumbnailInfo($id)
  {
    $article = Article::where('id', $id)->first(['thumbnail']);

    $thumbnailName = $article->thumbnail;

    $thumbnailInfo = [
      'name' => $thumbnailName,
      'size' => Storage::disk("public")->size("articles/" . $thumbnailName),
      'url' => Storage::url("articles/" . $thumbnailName)
    ];

    return response()->json($thumbnailInfo, 200);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $article = Article::with('category', 'author', 'tags')->where('id', $id)->first();
    $categories = Category::all()->map(function ($category) use ($article) {
      return ['details' => $category, 'is_active' => $category->id === $article->category->id];
    });
    $tags = Tag::all()->map(function ($tag) use ($article) {
      return ['details' => $tag, 'is_active' => $article->tags->contains('id', $tag->id)];
    });

    return response()->view('admin.pages.blog.edit', [
      'article' => $article,
      'categories' => $categories,
      'tags' => $tags
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try {
      $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:100|min:5',
        'description' => 'required|string|max:500',
        'thumbnail' => 'image|mimes:png,jpg,webp,svg,jpeg|max:2048',
        'slug' => 'required|max:150|string',
        'status' => 'required|numeric',
        'content' => 'required|string',
        'tags' => 'required',
        'category' => 'required|numeric|gt:0|exists:categories,id'
      ]);

      if ($validator->fails()) {
        return response()->json(['msg' => $validator->errors()->first()], 422);
      }


      $validated = $validator->validated();

      $oldArticle = Article::find($id);
      $oldThumbnailName = $oldArticle->thumbnail;

      // Gán tên thumbnail mới bằng tên thumbnail cũ trong db
      $newThumbnailName = $oldThumbnailName;

      // Kiểm tra trong mảng dữ liệu đã được xác thực có trường thumbnail không
      if (isset($validated["thumbnail"])) {
        $newThumbnail = $validated["thumbnail"];
        $newThumbnailName = $newThumbnail->getClientOriginalName();

        if ($newThumbnailName !== $oldThumbnailName) {
          $thumbnailPath = $newThumbnail->store('public/articles');
          $newThumbnailName = basename($thumbnailPath);
          Storage::disk('public')->delete('articles/' . $oldThumbnailName);
        }
      }

      $oldArticle->tags()->detach();
      $oldArticle->tags()->attach(json_decode($validated['tags']));

      Article::find($id)->update([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'content' => $validated['content'],
        'thumbnail' => $newThumbnailName,
        'slug' => $validated['slug'],
        'status' => $validated['status'],
        'category_id' => $validated['category'],
      ]);

      return response()->json(['msg' => 'Article updated successfully'], 200);
    } catch (Exception $e) {
      return response()->json(['msg' => $e->getMessage()], $e->getCode());
    }
  }

  public function updateStatus(Request $request, $id)
  {
    try {
      Article::where('id', $id)->first()->update(['status' => $request->input('status')]);

      return response()->json([
        'msg' => 'Article status updated successfully'
      ], 200);
    } catch (Exception $e) {
      return response()->json([
        'msg' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $thumbnailName = Article::where('id', $id)->first()->thumbnail;
      Article::where('id', $id)->delete();
      if (Storage::disk('public')->exists('articles/' . $thumbnailName)) {
        Storage::disk('public')->delete('articles/' . $thumbnailName);
      } else {
        return response()->json(['msg' => 'Thumbnail not found'], 200);
      }
      return response()->json([
        'msg' => 'The article has been deleted successfully'
      ], 204);
    } catch (Exception $e) {
      return response()->json([
        'msg' => $e->getMessage()
      ], 500);
    }
  }
}
