<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\BrandController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\WishlistController;

Route::get('locale/{locale}', [HomeController::class, 'locale'])->name('locale')->where('locale', '[a-z]+');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(ProductController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}', 'show')->name('show');
    });

Route::controller(CategoryController::class)
    ->prefix('categories')
    ->name('categories.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}', 'show')->name('show');
    });

Route::controller(BrandController::class)
    ->prefix('brands')
    ->name('brands.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}', 'show')->name('show');
    });

Route::controller(CartController::class)
    ->prefix('cart')
    ->name('cart.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('', 'store')->name('store');
        Route::delete('{id}', 'destroy')->name('destroy');
    });

Route::controller(WishlistController::class)
    ->prefix('wishlist')
    ->name('wishlist.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('', 'store')->name('store');
        Route::delete('{id}', 'destroy')->name('destroy');
    });