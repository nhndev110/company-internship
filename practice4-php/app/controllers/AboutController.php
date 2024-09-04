<?php

namespace app\controllers;

use app\core\BaseController;

class AboutController extends BaseController
{
  public function index()
  {
    $this->view("about.tpl");
  }
}
