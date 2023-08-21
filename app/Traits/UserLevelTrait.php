<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait UserLevelTrait
{
    public function upperLevelUsers(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()
            ->with(['roles' => function ($query) {
                $query->select(['id', 'name']);
            }])
            ->whereDoesntHave('roles', function (Builder $query) {
                $query->whereIn('id', [
                    Role::SUPER_ADMIN,
                    Role::ADMIN,
                    Role::MANAGER,
                    Role::AGENT,
                    Role::USER,
                ]);
            })
            ->get();
    }

    public function lowerLevelUsers($userId): array
    {
        $user = User::query()->with('roles')
            ->findOrFail($userId);
        if ($user->roles()->count() !== 1) {
            return [
                'success' => false,
                'message' => 'User have multiple roles.',
                'data' => []
            ];
        }
        $lowerRoleIds = Role::getLowerRoles($user->roles()->first()->id);
        if (empty($lowerRoleIds)) {
            return [
                'success' => false,
                'message' => 'No record found!',
                'data' => []
            ];
        }

        $lowerLevelIds = User::query()
            ->with(['roles' => function ($query) {
                $query->select(['id', 'name']);
            }])
            ->whereHas('roles', function (Builder $query) use ($lowerRoleIds) {
                $query->whereIn('id', $lowerRoleIds);
            })
            ->whereNull('parent_id')
            ->get();

        return [
            'success' => true,
            'message' => 'Record found',
            'data' => $lowerLevelIds
        ];
    }
}
