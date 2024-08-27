<?php

namespace app\mappers;

use app\core\IRowMapper;
use app\models\Category;

class CategoryMapper implements IRowMapper
{
  public function mapRow($rs)
  {
    $objs = [];
    foreach ($rs as $row) {
      $objs[] = new Category($row['id'], $row['name']);
    }
    return $objs;
  }
}
