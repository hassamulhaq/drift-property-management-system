<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Global\Category\CategoriesController;

Route::prefix('admin')
    ->middleware('auth:sanctum')
    ->name('admin.')
    ->group(function () {
        Route::controller(CategoriesController::class)
            ->prefix('categories')
            ->name('categories.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
                Route::post('/unique-slug', 'uniqueSlug')->name('unique-slug');
            });
    });
