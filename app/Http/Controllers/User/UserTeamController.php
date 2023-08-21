<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\LowerLevelUsersRequest;
use App\Http\Resources\User\LowerLevelUsersResource;
use App\Models\Role;
use App\Models\User;
use App\Traits\UserLevelTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserTeamController extends Controller
{
    use UserLevelTrait;

    public function index()
    {
        $users = User::query()
            ->with(['lower_level_roles'])
            ->with(['roles' => function ($query) {
                $query->select(['id', 'name']);
            }])
            ->whereDoesntHave('roles', function (Builder $query) {
                $query->whereIn('id', [
                    Role::SUPER_ADMIN,
                    Role::ADMIN,
                    Role::MANAGER,
                    Role::USER,
                    Role::AGENT,
                    Role::NATIONAL_SALE_DIRECTOR,
                ]);
            })
            ->select([
                'id', 'name', 'first_name', 'last_name', 'email', 'created_at'
            ])
            ->whereNull('users.parent_id')
            ->get();

        return Inertia::render('Users/Team/Index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $users = $this->getUpperLevelUsers();

        return Inertia::render('Users/Team/CreateTeam', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
    }

    public function show(User $user)
    {
    }

    public function edit(User $user)
    {
    }

    public function update(Request $request, User $user)
    {
    }

    public function destroy(User $user)
    {
    }

    public function getUpperLevelUsers()
    {
        return $this->upperLevelUsers();
    }
    public function getLowerLevelUsers(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $response = $this->lowerLevelUsers(userId: $request->input('userId'));

        //LowerLevelUsersResource::make()

        return LowerLevelUsersResource::collection($response['data'])->additional([$response['success'], $response['message']]);
    }
}
