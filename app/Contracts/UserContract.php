<?php

namespace App\Contracts;

use App\DTOs\UserDto;
use App\Models\User;

interface UserContract
{
    public function storeUserData(UserDto $userDto, User $user);
    public function updateUserData(UserDto $userDto, User $user);
}
