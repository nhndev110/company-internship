<?php

namespace app\mappers;

use app\core\IRowMapper;
use app\models\Tag;

class TagMapper implements IRowMapper
{
  public function mapRow($rs)
  {
    $objs = [];
    foreach ($rs as $row) {
      $objs[] = new Tag($row['id'], $row['name']);
    }
    return $objs;
  }
}
