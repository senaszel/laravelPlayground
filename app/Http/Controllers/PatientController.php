<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Providers\RouteServiceProvider;

class PatientController extends Controller
{
    public function home()
    {
        return view(
            RouteServiceProvider::HOME,
            [
                'patients' => Patient::all(),
                'chosenpatient' => null
            ]
        );
    }

    public function homeWithChosenPatient($id)
    {
        return view(
            RouteServiceProvider::HOME,
            [
                'patients' => Patient::all(),
                'chosenpatient' => Patient::find($id)
            ]
        );
    }
}
