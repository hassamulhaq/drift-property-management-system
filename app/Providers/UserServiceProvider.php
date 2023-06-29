<?php

namespace App\Providers;

use App\Contracts\UserContract;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            UserContract::class,
            fn () => new UserService()
        );
    }

    public function boot(): void
    {
    }
}
