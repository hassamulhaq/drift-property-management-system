<?php


use App\Http\Controllers\Global\Collection\CollectionsController;

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::controller(CollectionsController::class)->prefix('collections')
            ->name('collections.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
                Route::post('/unique-slug', 'uniqueSlug')->name('unique-slug');
            });
    });
