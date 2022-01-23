<?php

namespace App\Http\Controllers;

use App\Helpers\RoleTitleMatcher;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user.index-user', ['user' => $user]);
    }

    public function create()
    {
        return view('user.create-user');
    }

    public function store(CreateUserRequest $request)
    {
        $user = new User($request->validated());
        return redirect()->route('show-user', $user->id);
    }

    public function show(User $user)
    {
        return view('user.show-user', compact('user', $user));
    }

    public function edit(User $user)
    {
        return view('user.edit-user', compact('user', $user));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->title = RoleTitleMatcher::cast($request->role);
        $user->save();

        return redirect()->route('show-user', $user);
    }

    public function destroy(User $user)
    {
        User::where('id',$user->id)->delete();
        return redirect(User::latestID());
    }
}
