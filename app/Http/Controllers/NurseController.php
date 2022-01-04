<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Enums\UserTitle;
use App\Models\User;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function create()
    {
        return view('nurse.create-patient');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
        ]);

        // todo generator haseł.
        $generatedPassword = uniqid();
        $user = User::create([
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

        return view('nurse.confirm-mail-patient',compact('user','msg'));
    }

    public function confirmMail($user, $msg)
    {
        ddd('confirm',$user,$msg);
        return view('nurse.confirm-mail-patient', compact('user', 'msg'));
    }

    public function print(User $user)
    {
        // todo drukowanie danych pacjenta

        $msg = "Dane pacjenta zostały wydrukowane.";

        return view('nurse.confirm-mail-patient',compact('user','msg'));
    }
}