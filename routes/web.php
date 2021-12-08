<?php

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
//        return '<script type="text/javascript">alert("hello!");</script>';
)->name('home');

Route::get(
    '/patient/all', [\App\Http\Controllers\PatientController::class,'patientHome']
)->name('patient-all');

Route::get(
    'patient/{id}',
    [\App\Http\Controllers\PatientController::class, 'patientHomeWithChosenPatient']
)->name('patient-id');

Route::get(
    '/alert',
    function () {
        return '<script type="text/javascript">alert("hello!");</script>';
    }
)->name('alert');

Route::get(
    '/2',
    function () {
        return view('home');
    }
);
