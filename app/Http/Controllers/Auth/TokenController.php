<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TokenController extends Controller
{
    public function newToken(): JsonResponse
    {
        if (Auth::attempt(['email' => request('username'), 'password' => request('password')])) {
            $user = Auth::user();
            if ($user) {
                $otp = request('otp_code') ?? null;
                $tfaCheck = $user->checkTFA($otp);
                Log::info($tfaCheck);
                $role = $user->roles;
                if ($user->isManager() && $user->account_status != 'approved') {
                    return response()->json([
                        'error' => 'Not yet approved',
                        'message' => 'Sorry, portal access is denied until your Agent account has been approved.',
                    ], 401);
                }
                if ($tfaCheck) {
                    $user->update(['two_factor_expires_at' => Carbon::now()]);
                    $tokenName = 'KSPSUser';
                    $scope = ['initiate'];
                    $token = $user->createToken($tokenName, $scope)->plainTextToken;
                    $expiry = (int)config('drift-pms.api_token_expiry_minutes');
                    $this->removeExpiredTokens($user, $expiry);

                    return response()->json([
                        'user_id' => $user->id,
                        'token_type' => 'Bearer',
                        'access_token' => $token,
                        'token_expiry_minutes' => $expiry,
//                        'role' => $role->pluck('name')
                    ], 200);
                } else {
                    return response()->json([
                        'error' => 'otpfail',
                        'message' => 'A valid OTP is required',
                    ], 401);
                }
            }
        }

        return response()->json(['message' => 'I’m sorry the email address and password have not been recognised.  Please check and try again', 'error' => 'Unauthorised'], 401);
    }

    private function removeExpiredTokens($user, $expiry): void
    {
        $expiry = ($expiry) ? $expiry : (int) config('drift-pms.api_token_expiry_minutes');
        $expiredDate = Carbon::now()->subMinutes($expiry);
        $expiredTokens = $user->tokens()->where('created_at', '<', $expiredDate)->pluck('id');
        DB::table('personal_access_tokens')->whereIn('id', $expiredTokens)->delete();
    }

    public function testToken()
    {
        return response()->json(['success' => 'Token is authorised'], 200);
    }
}
