<?php

namespace app\mappers;

use app\core\IRowMapper;
use app\models\Article;

class ArticleMapper implements IRowMapper
{
  public function mapRow($rs)
  {
    $objs = [];
    foreach ($rs as $row) {
      $objs[] = new Article(
        $row['id'],
        $row['title'],
        $row['description'],
        $row['content'],
        $row['slug'],
        $row['thumbnail'],
        $row['status'],
        $row['category_id'],
        $row['author_id']
      );
    }
    return $objs;
  }
}
