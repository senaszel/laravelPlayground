<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserControllerRequest;
use App\Http\Requests\User\UpdateUserControllerRequest;
use App\Models\User;

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

    public function store(StoreUserControllerRequest $request)
    {
        $user = User::create($request->validated());
        ddd(User::find($user));
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

    public function update(UpdateUserControllerRequest $request, User $user)
    {
        $user = $user->update($request->validated());
        ddd($user);
        return redirect()->route('show-user', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('index-user',User::latest()->first()->id);
    }
}
