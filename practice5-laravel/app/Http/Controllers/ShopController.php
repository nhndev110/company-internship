<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
  public function index()
  {
    return view('pages.shop.index');
  }

  public function show($id)
  {
    return response()->view('pages.shop.show');
  }
}
