<?php
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/consultation', [ConsultationController::class, 'showPage'])->name('home')->middleware('AuthSession');

Route::get('/login',[AuthController::class, 'login'] )->name('login.form');
Route::post('/login',[AuthController::class, 'loginSubmit'] )->name('login.submit');

Route::get('/register',[AuthController::class, 'userRegister'] )->name('user.register.form');
Route::post('/register',[AuthController::class, 'userRegisterSubmit'] )->name('user.register.submit');


Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/header', function () {
    return view('header');
});
Route::get('/footer', function () {
    return view('footer');
});

Route::get('/register/veterinarian', function () {
    return view('pages.veterinarian.register.index');
})->name('register.veterinarian');

// Route::get('/register', function () {
//     return view('pages.user.register.index');
// })->name('register.user');