<?php

namespace App\Http\Controllers;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use App\Models\Vaccine;

class DoctorController extends Controller
{
    public function vaccinesIndex()
    {
        $vaccines = Vaccine::all();

        return view(
            'vaccines.index',
            [
                'vaccines' => $vaccines,
            ]
        );
    }

    public function showVaccine(Vaccine $vaccine)
    {
        return view(
            'vaccines.show-vaccine',
            [
                'vaccine' => $vaccine
            ]
        );
    }

    public function todayIndex(Application $application = null)
    {
        return view(
            'work.today-index',
            [
                'chosenAppointment' => $application
            ]
        );
    }

    public function confirmVaccination(Application $application)
    {
        $application
            ->where('id', $application->id)
            ->update([
                'status' => ApplicationStatus::DONE,
                'updated_at' => now(),
            ]);

        return redirect()->route('doctor-work-today');
    }

    public function denyVaccination(Application $application)
    {
        $application
            ->where('id', $application->id)
            ->update([
                'status' => ApplicationStatus::SKIPPED,
                'updated_at' => now(),
            ]);

        return redirect()->route('doctor-work-today');
    }

    public function workSchedule()
    {
        return view('work.index');
    }
}
