<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
  public function store(Request $request)
  {
    $tag = Tag::create(['name' => $request->name]);

    return response()->json(['data' => $tag, 'status' => 'success']);
  }
}
