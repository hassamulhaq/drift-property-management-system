<?php


Route::post('/media/upload', \App\Http\Controllers\Global\MediaController::class)
    ->middleware('auth:sanctum')
    ->name('media.upload');
