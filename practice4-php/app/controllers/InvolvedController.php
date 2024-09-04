<?php

namespace app\controllers;

use app\core\BaseController;

class InvolvedController extends BaseController
{
  public function index()
  {
    $this->view("involved.tpl");
  }
}
