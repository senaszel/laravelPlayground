<?php

namespace App\Http\Controllers;

use App\Enums\ApplicationStatus;
use App\Enums\UserRole;
use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function patientHome()
    {
        return view(
            'patients-home', [
                'patients' => User::where('role', UserRole::PATIENT)->get(),
                'chosenpatient' => null
            ]
        );
    }

    public function patientHomeWithChosenPatient($id)
    {
        return view(
            'patients-home', [
                'patients' => User::where('role', UserRole::PATIENT)->get(),
                'chosenpatient' => User::find($id)
            ]
        );
    }

    public function index()
    {
        $AuthUserId = Auth::user()->id;
        $applications = Application::all()->where('patient_id', $AuthUserId)->sortby('status');

        return view(
            'patient.index', [
                'applications' => $applications
            ]
        );
    }

    public function create()
    {
        return view('patient.create-application', [
            ]
        );
    }

    public function store(Request $request)
    {
        $application = Application::create([
            'patient_id' => Auth::user()->id,
            'vaccine_id' => $request->vaccine_id,
            'created-at' => now(),
        ]);

        return redirect()
            ->route('patient-show-application', [
                'application' => $application->id,
            ]);
    }

    public function certificatesIndex()
    {
        $AuthUserId = Auth::user()->id;
        $application = Application::where('patient_id', $AuthUserId)->orderby('created_at')->limit(1);
        $applications = Application::all()->where('status',ApplicationStatus::DONE)->where('patient_id', $AuthUserId)->sortby('status');

        return view('patient.show-certificate', [
                'applications' => $applications,
                'application' => $application->first(),
            ]
        );
    }

    public function showCertificate(Application $application)
    {
        $AuthUserId = Auth::user()->id;
        $applications = Application::all()->where('status',ApplicationStatus::DONE)->where('patient_id', $AuthUserId)->sortby('status');

        return view('patient.show-certificate', [
                'applications' => $applications,
                'application' => $application,
            ]
        );
    }

    public function showAll()
    {
        $AuthUserId = Auth::user()->id;
        $application = Application::where('patient_id', $AuthUserId)->orderby('created_at')->limit(1);
        $applications = Application::all()->where('patient_id', $AuthUserId)->sortby('status');

        return view('patient.show-application', [
                'applications' => $applications,
                'application' => $application->first(),
            ]
        );
    }

    public function show(Application $application)
    {
        $AuthUserId = Auth::user()->id;
        $applications = Application::all()->where('patient_id', $AuthUserId)->sortby('status');

        return view('patient.show-application', [
                'applications' => $applications,
                'application' => $application,
            ]
        );
    }

    public function edit(Application $application)
    {

        return view('patient.edit-application', $application);
    }

    public function update(Request $request)
    {
        $request->validate([

        ]);

        Application::create([

        ]);

        return view();
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route("patient-applications");
    }
}

