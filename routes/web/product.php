<?php

use \App\Http\Controllers\Product\ProductsController;

Route::prefix('admin')
    ->middleware('auth:sanctum')
    ->name('admin.')
    ->group(function () {
        Route::prefix('products')
            ->name('products.')
            ->group(function () {
                Route::controller(ProductsController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::post('/store', 'store')->name('store');
                        Route::get('/show/{id}', 'show')->name('show');
                        Route::get('/edit/{product}', 'edit')->name('edit');
                        Route::put('/update', 'update')->name('update');
                        Route::delete('/delete/{product}', 'destroy')->name('delete');
                        Route::post('unique-slug', 'uniqueSlug')->name('unique-slug');
                    });

                Route::prefix('types')->group(function () {
                    Route::controller(ProductsController::class)
                        ->group(function () {
                            Route::prefix('property')
                                ->name('property.')
                                ->group(function () {
                                    Route::get('/create', 'create')->name('create');
                                    Route::post('/store', 'store')->name('store');
                                    Route::put('/update', 'update')->name('update');
                                });
                        });
                });
            });
    });


Route::controller(ProductsController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('/{product:slug}', 'singleProduct')->name('product:slug');
    });
