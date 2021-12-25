<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get(
    '/',
    function () {
        return view('home');
    }
)->name('home');
Route::GET(
    '/logout',
    [RegisterController::class, 'logout']
)->name('logout');


Route::middleware('guest')->group(
    function () {
        Route::GET(
            '/register/create',
            [RegisterController::class, 'create']
        )->name('createNewUser');
        Route::POST(
            '/register/store',
            [RegisterController::class, 'store']
        )->name('storeNewUser');
        Route::GET(
            '/login',
            [RegisterController::class, 'showLogInForm']
        )->name('loginForm');
        Route::POST(
            '/login',
            [RegisterController::class, 'login']
        )->name('login');
    }
);


Route::middleware(['can:isAdmin'])->group(
    function () {
        Route::get(
            '/patient/all', [PatientController::class, 'patientHome']
        )->name('patient-all');
        Route::get(
            'patient/{id}', [PatientController::class, 'patientHomeWithChosenPatient']
        )->name('patient-id');
    }
);

