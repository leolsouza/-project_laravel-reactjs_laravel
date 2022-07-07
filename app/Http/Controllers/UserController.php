<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index(User $user)
    {
        return User::with('taskGroups.tasks')->get();
    }

    public function store(StoreUserRequest $request, User $user)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
    }

    public function show(User $user)
    {

    }

    public function update(UpdateUserRequest $request, User $user)
    {
    }

    public function destroy(User $user)
    {
        $user->delete();

        return $user;
    }
}
