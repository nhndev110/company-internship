<?php

namespace app\controllers;

use app\core\BaseController;

class RegisterController extends BaseController
{
  public function index()
  {
    $this->view("register.tpl");
  }
}
