<?php

namespace App\Traits;

trait AuthTrait
{
    public function getUserWithPermissions(): \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable|null
    {
        $user = auth()->user();
        if ($user) {
            $preparePermissions = [];
            $permissions = $user->getAllPermissions();
            if (count($permissions) > 0) {
                foreach ($permissions as $permission) {
                    $preparePermissions[$permission->id] = $permission;
                }
            }
            $user->user_permissions = $preparePermissions;
        }
        return $user;
    }
}
