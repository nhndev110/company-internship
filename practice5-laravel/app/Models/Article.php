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
    'category_id',
    'author_id'
  ];

  public function category()
  {
    return $this->hasOne(Category::class, 'id', 'category_id');
  }

  public function author()
  {
    return $this->hasOne(User::class, 'id', 'author_id');
  }
}
