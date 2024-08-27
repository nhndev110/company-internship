<?php

namespace app\mappers;

use app\core\IRowMapper;

class ArticlesTagsMapper implements IRowMapper
{
  public function mapRow($rs)
  {
    $result = [];
    foreach ($rs as $row) {
      $result[] = $row['article_id'];
      $result[] = $row['tag_id'];
    }
    return $result;
  }
}
