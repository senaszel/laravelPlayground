<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Providers\RouteServiceProvider;

class PatientController extends Controller
{
    public function patientHome()
    {
        return view(
            'patients-home',
            [
                'patients' => Patient::all(),
                'chosenpatient' => null
            ]
        );
    }

    public function patientHomeWithChosenPatient($id)
    {
        return view(
            'patients-home',
            [
                'patients' => Patient::all(),
                'chosenpatient' => Patient::find($id)
            ]
        );
    }
}
