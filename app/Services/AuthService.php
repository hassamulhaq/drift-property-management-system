<?php

namespace App\Services;

use App\Contracts\PasswordEmailContract;
use App\DTOs\PasswordEmailDto;
use App\Models\User;
use App\Notifications\UserPasswordResetNotification;
use App\Services\BaseService\BaseService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AuthService extends BaseService implements PasswordEmailContract
{
    /**
     * @param PasswordEmailDto $passwordEmailDto
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response
     */
    public function resetPasswordLink(PasswordEmailDto $passwordEmailDto): \Illuminate\Foundation\Application|Response|Application|ResponseFactory
    {
        $user = User::where('email', '=', $passwordEmailDto->email ?? '')->first();
        if ($user) {
            $userId = !is_null($user->id) ? $user->id : '';
            if ($userId != '') {
                $verification = $this->updateOrCreateVerificationToken(
                    ['user_id' => $userId, 'type' => 'reset_password', 'type_value' => $passwordEmailDto->email ?? '']);
                $verificationCode = $verification->code ?? null;
                if ($verificationCode) {
                    $mainAppUrl = config('app.url', null);
                    $verificationCode = $verification->code . '|' . $user->email;
                    $mainAppUrl = $mainAppUrl.'/' . 'reset-password/' . $this->customEncode($verificationCode);
                    $user->notify(new UserPasswordResetNotification(['url' => $mainAppUrl]));
                    return response(['success' => true, 'message' => 'Password Reset Email Sent'], 200);
                } else {
                    return response(['success' => false, 'message' => 'Password Reset Email Could Not Be Sent']);
                }
            } else {
                return response(['success' => false, 'message' => 'Password Reset Email Could Not Be Sent']);
            }
        } else {
            return response(['success' => false, 'message' => 'Email Not Found']);
        }
    }

    public function removeExpiredTokens(User|Model $user, int $expiry): void
    {
        $expiry = ($expiry) ?: (int) config('drift-pms.api_token_expiry_minutes');
        $expiredDate = now()->subMinutes($expiry);
        $expiredTokens = $user->tokens()
            ->where('created_at', '<', $expiredDate)
            ->pluck('id');

        DB::table('personal_access_tokens')
            ->whereIn('id', $expiredTokens)
            ->delete();
    }

    public function createTwoFactorVerificationToken(User|Model $user, string $tokenName, array $scope, int $expiry): array
    {
        $token = $user->createToken($tokenName, $scope)->plainTextToken;

        return [
            'user_id' => $user->id,
            'token_type' => 'Bearer',
            'access_token' => $token,
            'token_expiry_minutes' => $expiry
        ];
    }
}
