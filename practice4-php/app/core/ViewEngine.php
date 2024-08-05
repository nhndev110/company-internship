<?php

namespace app\core;

use Smarty\Smarty;

class ViewEngine extends Smarty
{
  public function __construct()
  {
    parent::__construct();

    $this->setTemplateDir(APP_PATH . '\\resources\\views\\');
    $this->setConfigDir(APP_PATH . '\\configs\\');
    $this->setCompileDir(APP_PATH . '\\storage\\templates_c\\');
    $this->setCacheDir(APP_PATH . '\\storage\\cache\\');

    $this->registerPlugin('function', 'assets', 'smarty_assets');

    $this->setEscapeHtml(true);

    $this->caching = Smarty::CACHING_OFF;
    $this->assign('app_name', 'Limitless');
  }

  public function render(string $template, array $data = [])
  {
    if (!empty($data)) {
      $this->assign($data);
    }
    $this->display($template);
  }
}
