<?php

namespace app\controllers;

use app\core\BaseController;

class LoginController extends BaseController
{
  public function index()
  {
    $this->view("login.tpl");
  }
}
