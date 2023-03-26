<?php

use \App\Http\Controllers\Dashboard\MenusController;

Route::prefix('admin')
    ->middleware('auth:sanctum')
    ->name('admin.')
    ->group(function () {
        Route::controller(MenusController::class)
            ->prefix('menu')
            ->name('menu.')
            ->group(function () {
//                Route::get('/{selected_menu?}', 'index')->name('index');
//                Route::post('/create', 'create')->name('create');
//                Route::get('/edit', 'edit')->name('edit');
//                Route::delete('/delete', 'destroy')->name('delete');
            });
    });
