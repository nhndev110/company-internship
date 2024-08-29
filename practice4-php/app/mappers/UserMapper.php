<?php

namespace app\mappers;

use app\core\IRowMapper;
use app\models\User;

class UserMapper implements IRowMapper
{
  public function mapRow($rs): array
  {
    $obj = [];
    foreach ($rs as $row) {
      $obj[] = new User($row['id'], $row['name'], $row['username'], $row['password']);
    }

    return $obj;
  }
}
