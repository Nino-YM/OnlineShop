<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('products', ProductController::class)->only(['index', 'show','create']);
Route::resource('categories', CategoryController::class)->only(['index', 'show','create']);
Route::resource('promotions', PromotionController::class)->only(['index', 'show', 'create']);


Route::resource('cart', CartController::class)->only(['index', 'store', 'destroy']);

Route::middleware('auth')->group(function () {
    Route::resource('favorites', FavoriteController::class)->only(['index', 'store', 'destroy']);
    Route::resource('orders', OrderController::class)->only(['index', 'store', 'destroy', 'show']);
    Route::resource('reviews', ReviewController::class)->only(['store', 'destroy']);
    Route::resource('users', UserController::class)->except(['create', 'store']);
    Route::resource('addresses', AddressController::class)->only(['index', 'store', 'edit', 'update', 'destroy', 'show', 'create']);
    Route::post('users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::resource('products', ProductController::class)->except(['index', 'show']);
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    Route::resource('promotions', PromotionController::class)->except(['index', 'show']);
});
