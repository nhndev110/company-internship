<?php

namespace app\controllers;

use app\core\BaseController;
use app\repositories\BlogRepository;

class BlogController extends BaseController
{
  public function index(): void
  {
    $articles = BlogRepository::getAll();
    $this->view("blog.tpl", ["articles" => $articles]);
  }

  public function show(string $blogId): void
  {
    $article = BlogRepository::getOneById(intval($blogId));
    if ($article == null) {
      die("not found article");
    }
    $this->view("article-details.tpl", ['article' => $article]);
  }
}
