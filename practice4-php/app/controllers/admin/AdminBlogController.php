<?php

namespace app\controllers\admin;

use app\core\BaseController;
use app\dtos\admin\ArticleListDTO;
use app\dtos\admin\CreateArticleDTO;
use app\dtos\admin\EditArticleDTO;
use app\models\Article;
use app\models\Category;
use app\repositories\BlogRepository;
use app\repositories\CategoryRepository;
use app\repositories\TagRespository;
use app\repositories\UserRepository;
use Exception;

class AdminBlogController extends BaseController
{
  public function index(): void
  {
    $articlesDTO = [];
    try {
      $articles = BlogRepository::getAll();
      foreach ($articles as $article) {
        $articlesDTO[] = new ArticleListDTO(
          $article,
          CategoryRepository::getOne($article->getCategoryId()),
          UserRepository::getOneById($article->getAuthorId()),
        );
      }
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
    $this->view('admin/blog.tpl', ["articles" => $articlesDTO]);
  }

  public function create(): void
  {
    $categories = CategoryRepository::getAll();
    $tags = TagRespository::getAll();
    $this->view('admin/create-article.tpl', ["categories" => $categories, "tags" => $tags]);
  }

  public function store(): void
  {
    if (
      !isset($_POST['articleTitle']) ||
      !isset($_POST['articleContent']) ||
      !isset($_POST['articleSlug']) ||
      !isset($_FILES['articleThumbnail']) ||
      !isset($_POST['articleStatus']) ||
      !isset($_POST['articleCategory']) ||
      !isset($_POST['articleTags'])
    ) {
      throw new Exception("Missing params!");
    }

    $articleTitle = $_POST['articleTitle'];
    $articleDesc = $_POST['articleDesc'];
    $articleContent = $_POST['articleContent'];
    $articleSlug = $_POST['articleSlug'];
    $articleThumbnail = $_FILES['articleThumbnail'];
    $articleStatus = $_POST['articleStatus'];
    $articleCategory = $_POST['articleCategory'];
    $articleTags = json_decode($_POST['articleTags']);

    $targetDir = APP_PATH . "/assets/img/blog/articles/";
    $thumbnailFileName = time() . "_" . basename($articleThumbnail["name"]);
    $targetFile = $targetDir . $thumbnailFileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (getimagesize($articleThumbnail["tmp_name"]) === false) {
      throw new Exception("File is not an image.");
    }

    if ($articleThumbnail["size"] > 500000) {
      throw new Exception("Sorry, your file is too large.");
    }

    if (
      $imageFileType != "jpg"
      && $imageFileType != "png"
      && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    if (!move_uploaded_file($articleThumbnail["tmp_name"], $targetFile)) {
      throw new Exception("Sorry, there was an error uploading your file.");
    }

    try {
      $newArticle = BlogRepository::insertOne(
        new CreateArticleDTO(
          $articleTitle,
          $articleDesc,
          $articleContent,
          $articleSlug,
          $thumbnailFileName,
          $articleStatus,
          $articleCategory,
          1,
          $articleTags,
        )
      );
      if ($newArticle->getStatus() === 1) {
        echo json_encode([
          "status" => "success",
          "msg" => "The article has been successfully published!",
        ]);
      } else if ($newArticle->getStatus() === 0) {
        echo json_encode([
          "status" => "success",
          "msg" => "The article has been successfully saved as a draft!",
        ]);
      }
    } catch (Exception $e) {
      echo json_encode([
        "status" => "error",
        "msg" => $e->getMessage()
      ]);
    }
  }

  public function show(string $articleId): void
  {
    $article = BlogRepository::getOneById(intval($articleId));
    echo json_encode([
      "status" => "success",
      "data" => [
        "id" => $article->getId(),
        "title" => $article->getTitle(),
        "description" => $article->getDescription(),
        "content" => $article->getContent(),
        "slug" => $article->getSlug(),
        "thumbnail" => $article->getThumbnail(),
        "status" => $article->getStatus(),
      ]
    ]);
  }

  public function edit(string $articleId): void
  {
    $article = BlogRepository::getOneById(intval($articleId));
    $categories = CategoryRepository::getAll();
    $tags = TagRespository::getAll();
    $articleDTO = new EditArticleDTO(
      $article->getId(),
      $article->getTitle(),
      $article->getDescription(),
      $article->getContent(),
      $article->getSlug(),
      $article->getThumbnail(),
      $article->getStatus(),
      CategoryRepository::getOne($article->getCategoryId())->getId(),
      UserRepository::getOneById($article->getAuthorId())->getId(),
      array_map(fn($tag) => $tag->getId(), TagRespository::getTagsByArticleId(intval($articleId))),
    );
    $this->view("admin/edit-article.tpl", [
      'article' => $articleDTO,
      'categories' => $categories,
      'tags' => $tags
    ]);
  }

  public function update(string $articleId): void
  {
    try {
      if (
        isset($_POST['articleTitle'])
        && isset($_POST['articleDesc'])
        && isset($_POST['articleContent'])
        && isset($_POST['articleSlug'])
        && isset($_POST['articleStatus'])
        && isset($_POST['articleCategory'])
        && isset($_POST['articleTags'])
      ) {
        $thumbnailFileName = BlogRepository::getOneById(intval($articleId))->getThumbnail();

        if (isset($_FILES['articleThumbnail'])) {
          $newThumbnail = $_FILES['articleThumbnail'];
          $targetDir = APP_PATH . "\\assets\\img\\blog\\articles\\";
          $oldThumbnailName = $thumbnailFileName;
          $thumbnailFileName = time() . "_" . basename($newThumbnail["name"]);
          $targetFile = $targetDir . $thumbnailFileName;
          $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

          if (getimagesize($newThumbnail["tmp_name"]) === false) {
            throw new Exception("File is not an image.");
          }

          if ($newThumbnail["size"] > 500000) {
            throw new Exception("Sorry, your file is too large.");
          }

          if (
            $imageFileType != "jpg"
            && $imageFileType != "png"
            && $imageFileType != "jpeg"
            && $imageFileType != "gif"
          ) {
            throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
          }

          if (!move_uploaded_file($newThumbnail["tmp_name"], $targetFile)) {
            throw new Exception("Sorry, there was an error uploading your file.");
          }

          $oldThumbnailPath = APP_PATH . '\\assets\\img\\blog\\articles\\' . $oldThumbnailName;
          if (is_file($oldThumbnailPath)) {
            unlink($oldThumbnailPath);
          }
        }

        $articleTags = json_decode($_POST['articleTags']);
        BlogRepository::updateById(intval($articleId), new CreateArticleDTO(
          $_POST['articleTitle'],
          $_POST['articleDesc'],
          $_POST['articleContent'],
          $_POST['articleSlug'],
          $thumbnailFileName,
          $_POST['articleStatus'],
          $_POST['articleCategory'],
          1,
          $articleTags
        ));
        echo json_encode([
          "status" => "success",
          "msg" => "Article updated successfully"
        ]);
      } else if (isset($_POST['articleStatus'])) {
        BlogRepository::updateStatusById(intval($articleId), intval($_POST['articleStatus']));
        echo json_encode([
          "status" => "success",
          "msg" => "Article status updated successfully"
        ]);
      } else {
        echo json_encode([
          "status" => "error",
          "msg" => "Missing parameters",
        ]);
      }
    } catch (Exception $e) {
      echo json_encode([
        "status" => "error",
        "msg" => $e->getMessage(),
      ]);
    }
  }

  public function destroy(string $articleId): void
  {
    try {
      $article = BlogRepository::getOneById(intval($articleId));
      $pathFileThumbnail = APP_PATH . '\\assets\\img\\blog\\articles\\' . $article->getThumbnail();
      BlogRepository::deleteOneById(intval($articleId));
      if (is_file($pathFileThumbnail)) {
        unlink($pathFileThumbnail);
        echo json_encode([
          "status" => "success",
          "message" => "Deleted successfully."
        ]);
      } else {
        echo json_encode([
          "status" => "success",
          "message" => "Deleted successfully. Thumbnail is not available!"
        ]);
      }
    } catch (Exception $e) {
      echo json_encode([
        "status" => "error",
        "message" => $e->getMessage(),
      ]);
    }
  }
}
