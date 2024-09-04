<?php

namespace app\repositories;

use app\core\BaseRepository;
use app\dtos\admin\CreateArticleDTO;
use app\mappers\ArticleMapper;
use app\models\Article;
use Exception;

class BlogRepository extends BaseRepository
{
  public static function getAll(): array
  {
    try {
      $articles = self::queryAllRecords("SELECT * FROM articles", new ArticleMapper);
      return $articles;
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  public static function getOneById(int $articleId): Article
  {
    $article = self::queryOneRecord("SELECT * FROM articles WHERE id = ?", new ArticleMapper, $articleId);
    return $article;
  }

  public static function insertOne(CreateArticleDTO $article): Article
  {
    try {
      $articleId = self::insert(
        "INSERT INTO articles(title, description, content, slug, thumbnail, status, category_id, author_id) VALUES (?,?,?,?,?,?,?,?)",
        $article->getTitle(),
        $article->getDescription(),
        $article->getContent(),
        $article->getSlug(),
        $article->getThumbnail(),
        $article->getStatus(),
        $article->getCategoryId(),
        $article->getAuthorId()
      );
      foreach ($article->getTagsId() as $tagId) {
        self::insert("INSERT INTO articles_tags (article_id, tag_id) VALUES (?,?)", $articleId, $tagId);
      }
      return self::getOneById($articleId);
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
    return null;
  }

  public static function updateById(int $articleId, CreateArticleDTO $newArticle)
  {
    try {
      self::update(
        "UPDATE articles
        SET
          title = ?,
          description = ?,
          content = ?,
          slug = ?,
          thumbnail = ?,
          status = ?,
          category_id = ?,
          author_id = ?
        WHERE id = ?",
        $newArticle->getTitle(),
        $newArticle->getDescription(),
        $newArticle->getContent(),
        $newArticle->getSlug(),
        $newArticle->getThumbnail(),
        $newArticle->getStatus(),
        $newArticle->getCategoryId(),
        1,
        $articleId
      );
      self::update("DELETE FROM articles_tags WHERE article_id = ?", $articleId);

      foreach ($newArticle->getTagsId() as $tagId) {
        self::insert(
          "INSERT INTO articles_tags VALUES (?,?)",
          $articleId,
          $tagId,
        );
      }
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  public static function updateStatusById(int $articleId, int $newStatus)
  {
    try {
      self::update("UPDATE articles SET status = ? WHERE id = ?", $newStatus, $articleId);
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  public static function deleteOneById(int $articleId)
  {
    try {
      self::update("DELETE FROM articles_tags WHERE article_id = ?", $articleId);
      self::update("DELETE FROM articles WHERE id = ?", $articleId);
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }
}
