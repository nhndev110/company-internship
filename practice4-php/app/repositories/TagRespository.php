<?php

namespace app\repositories;

use app\core\BaseRepository;
use app\mappers\TagMapper;
use app\models\Tag;
use Exception;

class TagRespository extends BaseRepository
{
  public static function getAll(): array
  {
    try {
      $tags = self::queryAllRecords("SELECT * FROM tags", new TagMapper);
      return $tags;
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  public static function getOne(int $tagId)
  {
    $tag = self::queryOneRecord("SELECT * FROM tags WHERE id = ?", new TagMapper, $tagId);
    return $tag;
  }

  public static function getTagsByArticleId(int $articleId): array
  {
    try {
      $tags = self::queryAllRecords(
        "SELECT tags.id, tags.name
        FROM tags
        JOIN articles_tags ON tags.id = articles_tags.tag_id
        WHERE articles_tags.article_id = ?",
        new TagMapper,
        $articleId
      );
      return $tags;
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  public static function insertOne(Tag $tag)
  {
    try {
      $newTagId = self::insert("INSERT INTO tags(name) VALUES (?)", $tag->getName());
      return self::getOne($newTagId);
    } catch (Exception $e) {
      echo json_encode(["status" => "error", "msg" => $e->getMessage()]);
    }
  }
}
