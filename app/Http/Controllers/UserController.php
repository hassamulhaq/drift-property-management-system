<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {

    }

    public function getAllUsers()
    {
        $users = User::query()->with('roles')->get();

        return Inertia::render('Users/AllUsers', [
            'users' => $users
        ]);
    }
}
