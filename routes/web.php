<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\RoleController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('promotions', PromotionController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('orders', OrderController::class);
Route::resource('favorites', FavoriteController::class);
Route::resource('users', UserController::class);
Route::resource('addresses', AddressController::class);
Route::resource('roles', RoleController::class);
