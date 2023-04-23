<?php

use \App\Http\Controllers\Shop\ShopsController;
use \App\Http\Controllers\Product\ProductController;


Route::get('/shop', [ShopsController::class, 'index'])->name('shop');

Route::prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('/{product:id}', [ProductController::class, 'singleProduct'])->name('single-product');
    });

Route::post('add-to-cart', [ShopsController::class, 'addToCart'])->name('shops.add-to-cart');
