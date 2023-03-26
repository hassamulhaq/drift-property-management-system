<?php

use \App\Http\Controllers\Shop\ShopsController;
use \App\Http\Controllers\Product\ProductsController;


Route::get('/shop', [ShopsController::class, 'index'])->name('shop');

Route::prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('/{product:id}', [ProductsController::class, 'singleProduct'])->name('single-product');
    });
