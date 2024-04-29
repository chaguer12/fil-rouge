<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SpecialityController;
use App\Models\Post;
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

Route::get('/blog', function () {
    $posts = Post::where('status', 1)->orderBy('id', 'desc')->get();
    return view('client.posts',['posts' => $posts]);
});


Route::get('/about', function () {
    return view('about');
})->name("about");
Route::get('/juristes/{speciality_id}',[ConsultantController::class,'redirect'])->name('juristes');
Route::get('/explore', [SpecialityController::class, 'display'])->name("explore");
Route::get('/register-form', [AuthController::class, 'create'])->name('register-form');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::get('/login-form', [AuthController::class, 'LoginForm'])->name('login-form');
Route::post('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
Route::get('/verify/{id}', [ConsultantController::class, 'verify'])->name('verify');
Route::patch('/image/{id}', [ConsultantController::class, 'image'])->name('image');
Route::get('/profile', [ConsultantController::class, 'profile'])->name('profile');
Route::resource('/Speciality', SpecialityController::class);
Route::resource('/consultant', ConsultantController::class);
Route::resource('/post',PostController::class);
Route::get('/testing',[AuthController::class,'testing'])->name("testing");
