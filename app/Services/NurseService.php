<?php

namespace App\Services;

use App\Interfaces\NurseServiceInterface;
use App\Models\Application;
use App\Models\User;

class NurseService implements NurseServiceInterface
{
    public function createPatient(array $validated): User
    {
        $user = new User;
        $user = $user->create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
            'title' => $validated['title'],
        ]);
        return $user;
    }

    public function updateVaccinationApplication(array $validated, Application $application): Application
    {
        $application->update($validated);
        return $application;
    }
}
