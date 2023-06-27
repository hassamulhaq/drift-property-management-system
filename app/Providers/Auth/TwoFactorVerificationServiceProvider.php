<?php

namespace App\Providers\Auth;

use App\Contracts\TwoFactorVerificationContract;
use App\Services\TwoFactorVerificationService;
use Illuminate\Support\ServiceProvider;

class TwoFactorVerificationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            TwoFactorVerificationContract::class,
            fn () => new TwoFactorVerificationService()
        );
    }

    public function boot(): void
    {
    }
}
