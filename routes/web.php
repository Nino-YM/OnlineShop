<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PromotionController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);
Route::resource('promotions', PromotionController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::resource('favorites', FavoriteController::class)->only(['index', 'store', 'destroy']);
    Route::resource('orders', OrderController::class)->only(['index', 'store', 'destroy', 'show']);
    Route::resource('addresses', AddressController::class)->only(['index', 'store', 'edit', 'update', 'destroy', 'show', 'create']);
    Route::resource('reviews', ReviewController::class)->only(['store', 'destroy']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('products', ProductController::class)->except(['index', 'show']);
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    Route::resource('promotions', PromotionController::class)->except(['index', 'show']);
});
