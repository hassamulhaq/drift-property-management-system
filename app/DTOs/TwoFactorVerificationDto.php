<?php

namespace App\DTOs;

use Spatie\LaravelData\Data;

final class TwoFactorVerificationDto extends Data
{
    public function __construct(
        public string $email,
        public string $two_factor_code
    ) {
    }
}
