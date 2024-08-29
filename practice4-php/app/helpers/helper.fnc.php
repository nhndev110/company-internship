<?php

function smarty_assets($params, $smarty)
{
  global $config_app;
  $app_url = $config_app['url'];
  $path = $params['path'];
  return $app_url . '/' . trim($path, '/');
}
