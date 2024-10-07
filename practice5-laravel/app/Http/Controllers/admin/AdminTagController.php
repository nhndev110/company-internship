<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminTagController extends Controller
{
  public function store(Request $request)
  {
    try {
      $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'unique:tags,name']
      ]);

      if ($validator->fails()) {
        return response()->json([
          'msg' => $validator->errors()->first()
        ], 422);
      }

      $tag = Tag::create(['name' => $request->name]);

      return response()->json(['data' => $tag], 201);
    } catch (Exception $e) {
      return response()->json(['error' => $e->getMessage()], 500);
    }
  }
}
