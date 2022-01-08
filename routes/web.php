<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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


// ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY
// ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY
// ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY
Route::get(
    '/', [
        NewsController::class, 'index'
    ]
)->name('home');

Route::get(
    'news/{news}', [
        NewsController::class, 'show'
    ]
)->name('show-news');

Route::GET(
    '/logout', [
        RegisterController::class, 'logout'
    ]
)->name('logout');
// ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY ANY
Route::GET(
    '/personals', [
        RegisterController::class, 'personals'
    ]
)->name('personals');


// GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST
// GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST GUEST
// todo poprawić namey i metody w tym crudzie
Route::middleware('guest')->group(
    function () {
        Route::GET(
            '/register/create', [
                RegisterController::class, 'create'
            ]
        )->name('createNewUser');

        Route::POST(
            '/register/store', [
                RegisterController::class, 'store'
            ]
        )->name('storeNewUser');

        Route::GET(
            '/login', [
                RegisterController::class, 'showLogInForm'
            ]
        )->name('loginForm');

        Route::POST(
            '/login', [
                RegisterController::class, 'login'
            ]
        )->name('login');
    }
);

// ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN
// ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN
// ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN
Route::middleware(['can:Admin'])->group(
    function () {

        Route::get(
            '/patient/all', [
                PatientController::class, 'patientHome'
            ]
        )->name('patient-all');

        Route::get(
            'patient/{id}', [
                PatientController::class, 'patientHomeWithChosenPatient'
            ]
        )->name('patient-id');

// ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN
// NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS
// NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS

        Route::get(
            'createnews', [
                NewsController::class, 'create'
            ]
        )->name('create-news');

        Route::post(
            'news/store', [
                NewsController::class, 'store'
            ]
        )->name('store-news');

        Route::get(
            'news/edit/{news}', [
                NewsController::class, 'edit'
            ]
        )->name('edit-news');

        Route::post(
            'update/{news}', [
                NewsController::class, 'update'
            ]
        )->name('update-news');

        Route::post(
            'news/destroy/{news}', [
                NewsController::class, 'destroy'
            ]
        )->name('destroy-news');

// ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN
// USER USER USER USER USER USER USER SER USER USER USER USER USER USER SER USER USER USER USER USER
// USER USER USER USER USER USER USER SER USER USER USER USER USER USER SER USER USER USER USER USER

        Route::get(
            'user/all/{user}', [
                UserController::class, 'index'
            ]
        )->name('index-user');

        Route::get(
            'user/create', [
                UserController::class, 'create'
            ]
        )->name('create-user');

        Route::post(
            'user/store', [
                UserController::class, 'store'
            ]
        )->name('store-user');

        Route::get(
            'user/show/{user}', [
                UserController::class, 'show'
            ]
        )->name('show-user');

        Route::get(
            'user/edit/{user}', [
                UserController::class, 'edit'
            ]
        )->name('edit-user');

        Route::post(
            'user/update/{user}', [
                UserController::class, 'update'
            ]
        )->name('update-user');

        Route::post(
            'user/destroy/{user}', [
                UserController::class, 'destroy'
            ]
        )->name('destroy-user');

    }
);

// NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE
// NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE
// NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE
Route::middleware(['can:Nurse'])->group(
    function () {

// NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE
// PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT
// PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT
        Route::get(
            'nurse/create', [
                NurseController::class, 'create'
            ]
        )->name('create-patient');

        Route::post(
            'nurse/store', [
                NurseController::class, 'store'
            ]
        )->name('store-patient');

        Route::get(
            'nurse/show/{user}', [
                NurseController::class, 'show'
            ]
        )->name('show-patient');

        Route::get(
            'nurse/mail-patient/{user}', [
                NurseController::class, 'mailPatient'
            ]
        )->name('mail-patient');

        Route::get(
            'nurse/confirm-mail-patient/{user}', [
                NurseController::class, 'confirmMail'
            ]
        )->name('confirm-mail-patient');

        Route::get(
            'nurse/print-patient/{user}', [
                NurseController::class, 'print'
            ]
        )->name('print-patient');

        // NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE NURSE
        // PLAN VACCINATIONS PLAN VACCINATIONS PLAN VACCINATIONS PLAN VACCINATIONS PLAN VACCINATIONS PLAN VACCINATIONS
        // PLAN VACCINATIONS PLAN VACCINATIONS PLAN VACCINATIONS PLAN VACCINATIONS PLAN VACCINATIONS PLAN VACCINATIONS

        Route::get(
            'plan/vaccinations/{application?}', [
                NurseController::class, 'planVaccinations'
            ]
        )->name('plan-vaccinations');

        Route::post(
            'plan/vaccination/update/{application}', [
                NurseController::class, 'updateVaccination'
            ]
        )->name('update-vaccination');
    }
);

// PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT
// PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT
// PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT
Route::middleware(['can:Patient'])->group(
    function () {

// PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT PATIENT
// APPLICATION APPLICATION APPLICATION APPLICATION APPLICATION APPLICATION APPLICATION APPLICATION
// APPLICATION APPLICATION APPLICATION APPLICATION APPLICATION APPLICATION APPLICATION APPLICATION
        Route::get(
            'applications/index', [
                PatientController::class, 'index'
            ]
        )->name('patient-applications');

        Route::get(
            'application/new', [
                PatientController::class, 'create'
            ]
        )->name('patient-create-application');

        Route::post(
            'application/store', [
                PatientController::class, 'store'
            ]
        )->name('patient-store-application');

        Route::get(
            'application/show/all', [
                PatientController::class, 'showAll'
            ]
        )->name('patient-show-applications');

        Route::get(
            'certificates/index', [
                PatientController::class, 'certificatesIndex'
            ]
        )->name('patient-certificates-index');

        Route::get(
            'certificates/{application}', [
                PatientController::class, 'showCertificate'
            ]
        )->name('patient-show-certificate');

        Route::get(
            'application/show/{application}', [
                PatientController::class, 'show'
            ]
        )->name('patient-show-application');

        Route::get(
            'application/edit/{application}', [
                PatientController::class, 'edit'
            ]
        )->name('patient-edit-application');

        Route::post(
            'application/update', [
                PatientController::class, 'update'
            ]
        )->name('patient-update-application');

        Route::post(
            'application/delete/{application}', [
                PatientController::class, 'destroy'
            ]
        )->name('patient-destroy-application');

    }
);

// DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR
// DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR
// DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR
Route::middleware(['can:Doctor'])->group(
    function () {

// DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR
// VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES
// VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES VACCINES
        Route::get(
            'vaccines/index', [
                DoctorController::class, 'vaccinesIndex'
            ]
        )->name('vaccines-index');

        Route::get(
            'vaccines/{vaccine}', [
                DoctorController::class, 'showVaccine'
            ]
        )->name('vaccines-show-vaccine');


// DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR DOCTOR
// TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK
// TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK TODAYS WORK
        Route::get(
            'work/today/{application?}', [
                DoctorController::class, 'todayIndex'
            ]
        )->name('doctor-work-today');

        Route::post(
            'work/today/confirm/{application}', [
                DoctorController::class, 'confirmVaccination'
            ]
        )->name('doctor-confirm-vaccination');

        Route::post(
            'work/today/deny/{application}', [
                DoctorController::class, 'denyVaccination'
            ]
        )->name('doctor-deny-vaccination');
    }
);

