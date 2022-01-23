<?php

namespace App\Services;

use App\Interfaces\UserServiceInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{

    public function create($validated): User
    {
        return User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
            'title' => $validated['title']
        ]);
    }

    public function update(array $validated, User $user): User
    {
        $user->update([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
            'title' => $validated['title']
        ]);
        return $user;
    }
}
