<?php

namespace App\Interfaces;

use App\Models\Application;
use App\Models\User;

interface NurseServiceInterface
{

    public function createPatient(array $validated): User;
    public function updateVaccinationApplication(array $validated, Application $application): Application;

}
