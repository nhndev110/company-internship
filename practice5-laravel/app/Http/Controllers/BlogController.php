<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::all(['name']);
    $articles = Article::with('category')->where('status', 1)->get();
    return view('pages.blog.index', [
      'categories' => $categories,
      'articles' => $articles
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  string  $slug
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(string $slug, int $id)
  {
    $article = Article::with('author', 'category', 'tags')
      ->where('id', $id)
      ->where('status', 1)
      ->first();

    if (empty($article)) {
      return redirect()->route('404');
    }

    return response()->view('pages.blog.show', ["article" => $article]);
  }
}
