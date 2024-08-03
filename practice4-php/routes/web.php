<?php

use app\controllers\admin\AdminBlogController;
use app\controllers\BlogController;

// User
$router->get('/blog', BlogController::class . "@index");
$router->get('/blog/{blogId}', BlogController::class . "@show");

// Admin
$router->get('/admin/blog', AdminBlogController::class . "@index");
