<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

  protected function createdAt(): Attribute
  {
    return Attribute::make(
      get: fn($value) => Carbon::parse($value)->format('d/m/Y')
    );
  }

  public function category()
  {
    return $this->hasOne(Category::class, 'id', 'category_id');
  }

  public function author()
  {
    return $this->hasOne(User::class, 'id', 'author_id');
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class, 'articles_tags', 'article_id', 'tag_id');
  }
}
