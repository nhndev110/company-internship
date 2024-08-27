<?php

/**
 * @var object $router
 */

$router->set404(function () {
  header('HTTP/1.1 404 Not Found');
});

$router->setNamespace('\app\controllers');

$router->get('/', function () {
  phpinfo();
});

// User
$router->mount('/blog', function () use ($router) {
  $router->get('/', 'BlogController@index');
  $router->get('/.*-(\d+)', 'BlogController@show');
});

// Admin
$router->mount('/admin', function () use ($router) {

  // Blog
  $router->mount('/blog', function () use ($router) {
    $router->get('/', 'admin\AdminBlogController@index');
    $router->get('/new', 'admin\AdminBlogController@create');
    $router->get('/{articleId}/edit', 'admin\AdminBlogController@edit');
    $router->get('/{articleId}', 'admin\AdminBlogController@show');
    $router->post('/store', 'admin\AdminBlogController@store');
    $router->post('/{articleId}', 'admin\AdminBlogController@update');
    $router->delete('/{articleId}', 'admin\AdminBlogController@destroy');
  });

  // Tag
  $router->mount('/tag', function () use ($router) {
    $router->get('/', 'admin\AdminTagController@index');
    $router->post('/store', 'admin\AdminTagController@store');
  });
});
