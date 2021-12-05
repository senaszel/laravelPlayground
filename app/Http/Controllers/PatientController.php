<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Providers\RouteServiceProvider;

class PatientController extends Controller
{
    public static function home()
    {
        return view(
            RouteServiceProvider::HOME,
            ['patients' => Patient::all(),
                'chosenpatient' => null]
        );
    }

    public static function patient($id)
    {
        return view(
            'components/layout/patient', ['chosenpatient' => Patient::find($id)]
        );
    }

    public static function mainview($id)
    {
        return view(
            'home',
            [
                'patients' => Patient::all(),
                'chosenpatient' => Patient::find($id)
            ]
        );
    }
}
