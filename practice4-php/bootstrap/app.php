<?php

define('APP_PATH', dirname(__DIR__));

require_once APP_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(APP_PATH);
$dotenv->load();

spl_autoload_register(function ($class) {
  require_once($class . '.php');
});

$router = new Bramus\Router\Router();
require_once APP_PATH . "/routes/api.php";
require_once APP_PATH . "/routes/web.php";
$router->run();
