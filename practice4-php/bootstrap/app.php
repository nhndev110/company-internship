<?php

define('APP_PATH', dirname(__DIR__));

require_once APP_PATH . '/vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(APP_PATH);
$dotenv->load();

$config_app = require_once APP_PATH . '/config/app.php';
$config_db = require_once APP_PATH . '/config/database.php';
require_once APP_PATH . '/app/helpers/helper.fnc.php';

spl_autoload_register(function ($class) {
  require_once $class . '.php';
});

$router = new Bramus\Router\Router();
require_once APP_PATH . "/routes/api.php";
require_once APP_PATH . "/routes/web.php";
$router->run();
