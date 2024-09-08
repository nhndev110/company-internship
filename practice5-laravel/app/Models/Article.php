<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'description',
    'thumbnail',
    'slug',
    'status',
    'content',
    'category_id'
  ];
}
