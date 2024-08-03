<?php

namespace app\repositories;

use app\core\BaseRepository;
use app\mappers\ArticleMapper;

class BlogRepository extends BaseRepository
{
  public static function getAll(): array
  {
    $articles = self::query("SELECT * FROM articles", new ArticleMapper);
    return $articles;
  }

  public static function getOneById(int $blogId)
  {
    $articles = self::query("SELECT * FROM articles WHERE id = ?", new ArticleMapper, $blogId);
    return empty($articles) ? null : $articles[0];
  }
}
