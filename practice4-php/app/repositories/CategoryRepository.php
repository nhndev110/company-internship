<?php

namespace app\repositories;

use app\core\BaseRepository;
use app\mappers\CategoryMapper;
use Exception;

class CategoryRepository extends BaseRepository
{
  public static function getAll(): array
  {
    try {
      $categories = self::queryAllRecords("SELECT * FROM categories", new CategoryMapper);
      return $categories;
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  public static function getOne(int $categoryId): object
  {
    try {
      $category = self::queryOneRecord("SELECT * FROM categories WHERE id = ?", new CategoryMapper, $categoryId);
      return $category;
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }
}
