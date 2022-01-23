<?php

namespace App\Http\Controllers;

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

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        Auth::attempt($credentials);
        // todo jak sie poda zle haslo to ma nie isc do homa
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('register.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return string
     */
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
