<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register\LoginRequest;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showLogInForm()
    {
        return view('register.loginForm');
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->validated())){
            return redirect()->route('home');
        };
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['bail', 'required', 'min:3,', 'max:15'],
            'email' => ['bail', 'required', 'unique:users', 'email', 'min:9', 'max:255'],
            'password' => ['bail', 'required', 'min:7', 'max:255']
        ]);
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('loginForm');
    }

    public function personals()
    {
        $authUserId = auth()->user()->id;
        $personals = Personal::where('user_id', $authUserId)->first();
        return view('register.personals', [
                'personals' => $personals,
            ]
        );
    }
}
