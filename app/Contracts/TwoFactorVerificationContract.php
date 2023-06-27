<?php

namespace App\Contracts;

use App\DTOs\TwoFactorVerificationDto;

interface TwoFactorVerificationContract
{
    public function verifyCode(TwoFactorVerificationDto $twoFactorVerificationDto);
}
