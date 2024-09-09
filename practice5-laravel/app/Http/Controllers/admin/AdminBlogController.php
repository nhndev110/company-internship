<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response(view('admin.blog'));
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
    return view('admin.create-article', ['categories' => $categories, 'tags' => $tags]);
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

    $thumbnailPath = $request->file('thumbnail')->store('articles');

    $thumbnailName = substr($thumbnailPath, strlen("articles/"));

    $article = new Article;

    $article->title = $request->input('title');
    $article->description = $request->input('description');
    $article->thumbnail = $thumbnailName;
    $article->slug = $request->input('slug');
    $article->status = $request->input('status');
    $article->content = $request->input('content');
    $article->category_id = $request->input('categoryId');

    $statusSave = $article->save();

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

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
