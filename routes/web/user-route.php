<?php

use \App\Http\Controllers\UserController;

Route::prefix('admin')
    ->middleware(['auth:sanctum', 'verified'])
    ->name('admin.')
    ->group(function () {
        Route::prefix('users')
            ->name('users.')
            ->group(function () {
                Route::controller(UserController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('store', 'store')->name('store');
                        Route::post('update', 'update')->name('update');
                    });
            });
    });




