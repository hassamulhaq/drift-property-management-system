<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\DTOs\UserDto;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function __construct(
        public UserContract $userService
    )
    {

    }

    public function index()
    {
        $users = User::query()->with('roles')->get();

        return Inertia::render('Users/AllUsers', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = Role::query()
            ->select(['id', 'name'])
            ->whereNotIn('id', [
                Role::SUPER_ADMIN,
                Role::ADMIN,
                Role::MANAGER,
                Role::AGENT,
                Role::AGENT,
                Role::NATIONAL_SALE_DIRECTOR,
            ])->get();

        return Inertia::render('Users/CreateUser', [
            'roles' => $roles
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        $userDto =  UserDto::from([
            ...$validated
        ]);

        $response = $this->userService->storeUserData($userDto, new User());

        return redirect()->back()->with([
            'response' => $response
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();
        $userDto =  UserDto::from([
            ...$validated
        ]);

        $response = $this->userService->update($userDto, $user);

        return redirect()->back()->with([
            'response' => $response
        ]);
    }
}
