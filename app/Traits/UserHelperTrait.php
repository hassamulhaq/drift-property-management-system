<?php

namespace App\Traits;

use App\Models\User;

trait UserHelperTrait
{
    public function getUserOrGuestId(): int|string|null
    {
        return (auth()->guest()) ? User::ROLE_GUEST :  auth()->id();
    }
}
