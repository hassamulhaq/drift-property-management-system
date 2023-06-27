<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\TwoFactorVerificationContract;
use App\DTOs\TwoFactorVerificationDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\TwoFactorVerificationRequest;
use App\Http\Resources\TwoFactorVerificationResource;
use App\Services\AuthService;

class TwoFactorVerificationController extends Controller
{
    public function __construct(
        public TwoFactorVerificationContract $twoFactorVerificationService,
        public AuthService $authService
    )
    {
    }

    public function verify(TwoFactorVerificationRequest $request)
    {
        $validated = $request->validated();
        $twoFactorVerificationDto = TwoFactorVerificationDto::from([
            ...$validated,
        ]);

        $response = $this->twoFactorVerificationService->verifyCode($twoFactorVerificationDto);

        return new TwoFactorVerificationResource(
            success: $response['success'],
            message: $response['message'],
            data: $response['data'] ?? []
        );
    }
}
