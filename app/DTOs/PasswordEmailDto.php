<?php

namespace App\DTOs;

use Spatie\LaravelData\Data;

final class PasswordEmailDto extends Data
{
    public function __construct(
        public string $email
    ) {
    }
}
