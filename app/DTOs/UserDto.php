<?php

namespace App\DTOs;

use Spatie\LaravelData\Data;

final class UserDto extends Data
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $phone,
        public string $password,
        public string|null $country,
        public string|null $city,
        public string|null $state,
        public string|null $cnic,
        public string|null $zip,
        public string $address,
        public string|null $address2,
        public string $type,
        public string $role,
    )
    {
    }
}
