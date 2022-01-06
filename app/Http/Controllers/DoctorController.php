<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function vaccinesIndex()
    {
        $vaccines = Vaccine::all();

        return view('vaccines.index', [
                'vaccines' => $vaccines,
            ]
        );
    }

    public function showVaccine(Vaccine $vaccine)
    {
        return view('vaccines.show-vaccine', [
                'vaccine' => $vaccine
            ]
        );
    }
}
