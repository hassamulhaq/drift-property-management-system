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
        public string $country,
        public string $city,
        public string $state,
        public string $cnic,
        public string $zip,
        public string $address,
        public string $address2,
        public string $type,
        public string $role,
    )
    {
    }
}
