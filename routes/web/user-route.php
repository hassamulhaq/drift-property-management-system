<?php

use \App\Http\Controllers\UserController;
use \App\Http\Controllers\User\UserTeamController;

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
                Route::resource('teams', UserTeamController::class);

                Route::post('get-upper-level-users', [UserTeamController::class, 'getUpperLevelUsers'])
                    ->name('upper-level-users');

                Route::post('get-lower-level-users', [UserTeamController::class, 'getLowerLevelUsers'])
                    ->name('lower-level-users');

            });
    });




