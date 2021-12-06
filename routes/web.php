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
    '/', [\App\Http\Controllers\PatientController::class,'home']
)->name('home');

Route::get(
    '/{id}',
    [\App\Http\Controllers\PatientController::class,'mainview']
)
    ->name('homewithid');

Route::get(
    '/alert',
    function () {
        return '<script type="text/javascript">alert("hello!");</script>';
    }
);
