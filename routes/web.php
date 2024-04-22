<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\SpecialityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name("about");
Route::get('/explore', [SpecialityController::class, 'display'])->name("explore");
Route::get('/register-form', [AuthController::class, 'create'])->name('register-form');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::get('/login-form', [AuthController::class, 'LoginForm'])->name('login-form');
Route::post('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
Route::get('/verify/{id}', [ConsultantController::class, 'verify'])->name('verify');
Route::resource('/Speciality', SpecialityController::class);
Route::resource('/consultant', ConsultantController::class);
