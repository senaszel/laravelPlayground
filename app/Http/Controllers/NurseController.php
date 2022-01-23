<?php

namespace App\Http\Controllers;

use App\Interfaces\NurseServiceInterface;
use App\Enums\ApplicationStatus;
use App\Http\Requests\Nurse\StoreNurseControllerRequest;
use App\Http\Requests\Nurse\UpdateVaccinationRequest;
use App\Models\Application;
use App\Models\User;

class NurseController extends Controller
{
    private $nurseService;

    public function __construct(NurseServiceInterface $nurseService)
    {
        $this->nurseService = $nurseService;
    }


    public function create()
    {
        return view('nurse.create-patient');
    }

    public function store(StoreNurseControllerRequest $request)
    {
        $user = $this->nurseService->createPatient($request->validated());
        return redirect()->route('show-patient', $user->id);
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

    public function updateVaccination(UpdateVaccinationRequest $request, Application $application)
    {
        $this->nurseService->updateVaccinationApplication($request->validated(), $application);
        return redirect()->route('plan-vaccinations');
    }
}
