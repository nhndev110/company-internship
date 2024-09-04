<?php

namespace app\controllers;

use app\core\BaseController;

class ContactController extends BaseController
{
  public function index()
  {
    $this->view("contact.tpl");
  }
}
