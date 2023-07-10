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

    public function lowerLevelUsers(Request $request): bool|string
    {
        $userId = $request->input('user_id');
        $user = User::query()->with('roles')
            ->findOrFail($userId);
        if ($user->roles()->count() !== 1) {
            return json_encode([
                'success' => false,
                'message' => 'User have multiple roles.'
            ]);
        }
        $lowerRoleIds = Role::getLowerRoles($user->roles()->first()->id);
        if (empty($lowerRoleIds)) {
            return json_encode([
                'success' => false,
                'message' => 'No record found!'
            ]);
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

        return json_encode([
            'success' => true,
            'message' => 'Record found',
            'data' => $lowerLevelIds
        ]);
    }
}
