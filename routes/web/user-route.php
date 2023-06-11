<?php

use \App\Http\Controllers\UserController;

Route::prefix('users')
    ->name('users.')
    ->middleware(['web', 'auth', 'verified'])
    ->group(function () {
        Route::prefix('action')
            ->name('action.')
            ->group(function () {});

        Route::get('/all-users', [UserController::class, 'getAllUsers'])->name('all-users');
    });


