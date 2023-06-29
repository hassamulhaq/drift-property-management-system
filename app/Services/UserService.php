<?php

namespace App\Services;

use App\Contracts\UserContract;
use App\DTOs\UserDto;
use App\Models\User;
use App\Services\BaseService\BaseService;

class UserService extends BaseService implements UserContract
{
    public function storeUserData(UserDto $userDto, User $user): bool|array
    {
        $user = $user->create($userDto->all());
        if ($user->wasRecentlyCreated) {
            return [
                'success' => true,
                'message' => 'User created',
                'data' => $user
            ];
        }

        return false;
    }

    public function updateUserData(UserDto $userDto, User $user): bool
    {
        return $user->update($userDto->all());
    }
}
