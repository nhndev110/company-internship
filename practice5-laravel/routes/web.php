<?php

use App\Http\Controllers\admin\AdminBlogController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/logout', [LogoutController::class, 'logout']);

Route::middleware('admin.auth')->prefix('admin')->name('admin.')->group(function () {
  Route::redirect('/', '/admin/dashboard');

  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

  Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [AdminBlogController::class, 'index'])->name('index');
  });
});
