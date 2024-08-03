<?php

namespace app\controllers\admin;

use app\core\BaseController;

class AdminBlogController extends BaseController
{
  public function index(): void
  {
    $this->view("admin/blog.tpl");
  }
}
