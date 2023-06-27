<?php

namespace App\Services;

use App\Contracts\TwoFactorVerificationContract;
use App\DTOs\TwoFactorVerificationDto;
use App\Models\User;
use App\Services\AuthService;
use App\Services\BaseService\BaseService;
class TwoFactorVerificationService extends BaseService implements TwoFactorVerificationContract
{
    public function verifyCode(TwoFactorVerificationDto $twoFactorVerificationDto): array
    {
        $user = User::query()
            ->whereEmail($twoFactorVerificationDto->email)
            ->whereTwoFactorEnabled(true)
            ->whereNotNull('two_factor_code')
            ->whereNotNull('two_factor_expires_at')
            ->firstOrFail();

        if (now() > $user->two_factor_expires_at) {
            return [
                'success' => false,
                'message' => 'Code is expired or already used. Request a new code and try again.',
                'data' => []
            ];
        }

        if ($twoFactorVerificationDto->two_factor_code == decrypt($user->two_factor_code)) {
            $user->updateQuietly([
                'two_factor_expires_at' => now()
            ]);
            $expiry = (int) config('drift-pms.api_token_expiry_minutes');
            $tokenRes = (new AuthService())->createTwoFactorVerificationToken(
                user: $user,
                tokenName: 'drift-2FA-Token',
                scope: ['initiate'],
                expiry: $expiry
            );
            (new AuthService())->removeExpiredTokens(user: $user, expiry: $expiry);

            return [
                'success' => true,
                'message' => 'Code validated.',
                'data' => $tokenRes
            ];
        }

        if ($twoFactorVerificationDto->two_factor_code != decrypt($user->two_factor_code)) {
            return [
                'success' => false,
                'message' => 'That code’s no longer valid. Request a new code and try again.',
                'data' => []
            ];
        }

        return [
            'success' => false,
            'message' => 'Something went wrong. Contact support.',
            'data' => []
        ];
    }
}
