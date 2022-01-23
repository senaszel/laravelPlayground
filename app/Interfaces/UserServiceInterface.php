<?php

namespace App\Interfaces;

use App\Models\User;

interface UserServiceInterface {

    public function create(array $validated) : User;
    public function update(array $validated,User $user) : User;

}
