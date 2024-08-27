<?php

namespace app\controllers;

use app\core\BaseController;
use app\dtos\ArticleListDTO;
use app\dtos\ArticleShowDTO;
use app\repositories\BlogRepository;
use app\repositories\CategoryRepository;
use app\repositories\UserRepository;

class BlogController extends BaseController
{
  public function index(): void
  {
    $articlesDTO = [];
    try {
      $articles = BlogRepository::getAll();
      foreach ($articles as $article) {
        if ($article->getStatus() === 1) {
          $articlesDTO[] = new ArticleListDTO(
            $article,
            CategoryRepository::getOne($article->getCategoryId()),
            UserRepository::getOne($article->getAuthorId()),
          );
        }
      }
      $highlight = array_slice($articlesDTO, -1);
      array_splice($articlesDTO, -1);
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage());
    }
    $this->view('blog.tpl', ["articles" => $articlesDTO, "highlight" => $highlight[0]]);
  }

  public function show(string $articleId): void
  {
    $article = BlogRepository::getOneById(intval($articleId));
    $articleDTO = new ArticleShowDTO(
      $article,
      CategoryRepository::getOne($article->getCategoryId()),
      UserRepository::getOne($article->getAuthorId()),
    );
    if ($article == null) {
      die("not found article");
    }
    $this->view("article-details.tpl", ['article' => $articleDTO]);
  }
}
