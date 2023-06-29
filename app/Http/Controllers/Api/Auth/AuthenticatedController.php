<?php

namespace App\Http\Controllers\Api\Auth;

use App\Enums\UserEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\TwoFactorVerificationResource;
use App\Http\Resources\TwoStepConfirmationEmailSentResource;
use App\Providers\RouteServiceProvider;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        if (Auth::check() && Auth::user()->two_factor_enabled == (int) UserEnum::TwoFactorEnabled->value) {
            // create 2FA token
            Auth::user()->setOtp();

            return new TwoStepConfirmationEmailSentResource(
                success: true,
                message: "Two step confirmation code is sent to your email ({$request->email}).",
                data: [
                    'url' => route('two-factor-verification')
                ]
            );
        }

        if (Auth::check() && Auth::user()->two_factor_enabled == UserEnum::TwoFactorDisabled->value) {
            $user = Auth::user();
            $expiry = (int) config('drift-pms.api_token_expiry_minutes');
            $tokenRes = (new AuthService())->createTwoFactorVerificationToken(
                user: $user,
                tokenName: 'PMS-2FA-Token',
                scope: ['initiate'],
                expiry: $expiry
            );
            (new AuthService())->removeExpiredTokens(user: $user, expiry: $expiry);

            return new TwoFactorVerificationResource(
                success: true,
                message: 'User logged-in success',
                data: $tokenRes
            );
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
