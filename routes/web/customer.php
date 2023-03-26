<?php

use App\Http\Controllers\Cart\CartsController;
use App\Http\Controllers\Wishlist\WishlistsController;

Route::prefix('customer')
    ->name('customer.')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/wishlist', [WishlistsController::class, 'index'])->name('index');
        Route::post('/wishlist/{product:id}', [WishlistsController::class, 'addOrRemove'])->name('wishlist.add-or-remove');
        Route::post('/wishlist/{product_id}/move-to-cart', [WishlistsController::class, 'moveToCart'])->name('wishlist.move-to-cart');
    });

Route::prefix('customer')
    ->name('customer.')
    ->middleware(['web'])
    ->group(function () {
        Route::prefix('cart')
            ->name('cart.')
            ->group(function () {
                Route::post('/', [CartsController::class, 'store'])->name('store');
                Route::delete('/remove-to-cart', [CartsController::class, 'destroy'])->name('remove-to-cart');
            });
    });

Route::get('/cart', [CartsController::class, 'index'])->name('cart');
Route::get('/checkout', [CartsController::class, 'index'])->name('checkout');
