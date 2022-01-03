<?php

use App\Http\Controllers\NewsController;
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

Route::get(
    '/',
    [NewsController::class, 'index']
)->name('home');

Route::get(
    'news/{news}', [NewsController::class, 'show']
)->name('show-news');

Route::GET(
    '/logout',
    [RegisterController::class, 'logout']
)->name('logout');

// todo poprawić namey i metody w tym crudzie
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

Route::middleware(['can:Admin'])->group(
    function () {

        Route::get(
            '/patient/all', [PatientController::class, 'patientHome']
        )->name('patient-all');
        Route::get(
            'patient/{id}', [PatientController::class, 'patientHomeWithChosenPatient']
        )->name('patient-id');


        // NEWS NEWS NEWS NEWS NEWS NEWS NEWS
        // NEWS NEWS NEWS NEWS NEWS NEWS NEWS

        Route::get(
            'createnews',[NewsController::class,'create']
        )->name('create-news');
        Route::post(
            'news/store', [NewsController::class, 'store']
        )->name('store-news');

        Route::get(
            'news/edit/{news}', [NewsController::class, 'edit']
        )->name('edit-news');
        Route::post(
            'update/{news}', [NewsController::class, 'update']
        )->name('update-news');
        Route::post(
            'news/destroy/{news}', [NewsController::class, 'destroy']
        )->name('destroy-news');


        // USER USER USER USER USER USER USER
        // USER USER USER USER USER USER USER

        Route::get(
            'user/all/{user}',[UserController::class,'index']
        )->name('index-user');
        Route::get(
            'user/create',[UserController::class,'create']
        )->name('create-user');
        Route::post(
            'user/store', [UserController::class, 'store']
        )->name('store-user');
        Route::get(
            'user/{user}', [UserController::class, 'show']
        )->name('show-user');

        Route::get(
            'user/edit/{user}', [UserController::class, 'edit']
        )->name('edit-user');
        Route::post(
            'user/update/{user}', [UserController::class, 'update']
        )->name('update-user');
        Route::post(
            'user/destroy/{user}', [UserController::class, 'destroy']
        )->name('destroy-user');



    }
);

