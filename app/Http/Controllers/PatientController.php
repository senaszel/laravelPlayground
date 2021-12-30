<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;

class PatientController extends Controller
{
    public function patientHome()
    {
        return view(
            'patients-home',
            [
                'patients' => User::where('role',UserRole::PATIENT)->get(),
                'chosenpatient' => null
            ]
        );
    }

    public function patientHomeWithChosenPatient($id)
    {
        return view(
            'patients-home',
            [
                'patients' => User::where('role',UserRole::PATIENT)->get(),
                'chosenpatient' => User::find($id)
            ]
        );
    }
}
