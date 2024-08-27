<?php

namespace app\repositories;

use app\core\BaseRepository;
use app\mappers\UserMapper;
use app\models\User;

class UserRepository extends BaseRepository
{
  public static function getOne(int $userId): User
  {
    try {
      $user = self::queryOneRecord("SELECT * FROM users WHERE id = ?", new UserMapper, $userId);
      return $user;
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage());
    }
  }
}
