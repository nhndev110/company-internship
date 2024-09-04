<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminBlogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('shop')->name('shop.')->group(function () {
  Route::get('/', [ShopController::class, 'index'])->name('index');
});

Route::prefix('blog')->name('blog.')->group(function () {
  Route::get('/', [BlogController::class, 'index'])->name('index');
  Route::get('/{articleSlug}-{articleId}', [BlogController::class, 'show'])
    ->name('show')
    ->where(['articleSlug' => '.*', 'articleId' => '[0-9]+']);
});


Route::middleware('admin.auth')->prefix('admin')->name('admin.')->group(function () {
  Route::get('/login', [AdminAuthController::class, 'index'])->name('login');

  Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [AdminBlogController::class, 'index'])->name('index');
  });
});
