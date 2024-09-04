<?php

namespace app\repositories;

use app\core\BaseRepository;
use app\mappers\UserMapper;
use app\models\User;

class UserRepository extends BaseRepository
{
  public static function getOneById(int $userId): User
  {
    try {
      $user = self::queryOneRecord("SELECT * FROM users WHERE id = ?", new UserMapper, $userId);
      return $user;
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage());
    }
  }

  public static function getOneByUsernameAndPassword(string $username, string $password)
  {
    try {
      $user = self::queryOneRecord(
        "SELECT * FROM users WHERE username = ? AND password = ?",
        new UserMapper,
        $username,
        $password
      );
      return $user;
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage());
    }
  }

  public static function getUserByTokenRemember(string $tokenRemember)
  {
    try {
      return self::queryOneRecord("SELECT * FROM users WHERE token_remember = ?", new UserMapper, $tokenRemember);
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage());
    }
    return null;
  }

  public static function updateTokenRemember(int $userId, string $tokenRemember): bool
  {
    try {
      return self::update(
        "UPDATE users
        SET
          token_remember = ?
        WHERE id = ?",
        $tokenRemember,
        $userId,
      );
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage());
    }
    return false;
  }
}
