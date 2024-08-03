<?php

namespace app\core;

class BaseController
{

  protected $viewEngine;

  public function __construct()
  {
    $this->viewEngine = new ViewEngine();
  }

  protected function view(string $template, array $data = []): void
  {
    $this->viewEngine->render($template, $data);
  }
}
