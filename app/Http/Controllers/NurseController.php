<?php

namespace App\Http\Controllers;

use App\Enums\ApplicationStatus;
use App\Enums\UserRole;
use App\Enums\UserTitle;
use App\Http\Requests\Nurse\StoreNurseControllerRequest;
use App\Http\Requests\Nurse\UpdateVaccinationRequest;
use App\Models\Application;
use App\Models\User;

class NurseController extends Controller
{
    public function create()
    {
        return view('nurse.create-patient');
    }

    public function store(StoreNurseControllerRequest $request)
    {
        $bytes = openssl_random_pseudo_bytes(4);
        $generatedPassword = bin2hex($bytes);
        $user = new User;
        $user = $user->create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($generatedPassword),
            'role' => UserRole::PATIENT,
            'title' => UserTitle::PATIENT,
        ]);

        return redirect()
            ->route('show-patient', $user->id);
    }

    public function show(User $user)
    {
        return view('nurse.show-patient', [
            'user' => $user
        ]);
    }

    public function mailPatient(User $user)
    {
        // todo wysyłanie maila z danymi do pacjenta

        $msg = "Dane pacjenta zostały wysłane na podany adres email.";

        return view('nurse.confirm-mail-patient', compact('user', 'msg'));
    }

    public function confirmMail($user, $msg)
    {
        return view('nurse.confirm-mail-patient', compact('user', 'msg'));
    }

    public function print(User $user)
    {
        // todo drukowanie danych pacjenta
        $msg = "Dane pacjenta zostały wydrukowane.";
        return view('nurse.confirm-mail-patient', compact('user', 'msg'));
    }

    public function planVaccinations(Application $application)
    {
        return view(
            'nurse.plan-vaccinations',
            [
                'application' => $application
            ]
        );
    }

    public function updateVaccination(
        Application $application,
        UpdateVaccinationRequest $request
        )
    {
        $application
            ->where('id', $application->id)
            ->update(array_merge($request->validated(), array_combine((array)'status', (array)ApplicationStatus::PENDING)));

        return redirect()->route('plan-vaccinations');
    }
}
