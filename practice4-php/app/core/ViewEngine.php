<?php

namespace app\core;

use Smarty\Smarty;

class ViewEngine extends Smarty
{
  public function __construct()
  {
    parent::__construct();

    $this->setTemplateDir(APP_PATH . '/resources/views');
    $this->setCompileDir(APP_PATH . '/storage/templates_c');
    $this->setConfigDir(APP_PATH . '/storage/configs');
    $this->setCacheDir(APP_PATH . '/storage/cache');

    $this->setEscapeHtml(true);

    $this->caching = Smarty::CACHING_OFF;
    $this->assign('app_name', 'Nonprofit Organization');
  }

  public function render(string $template, array $data = [])
  {
    if (!empty($data)) {
      $this->assign($data);
    }
    $this->display($template);
  }
}
