<?php
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/consultation', [ConsultationController::class, 'showPage'])->name('consultation');
Route::get('/', function () {
    return view('pages.user.login-register.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/header', function () {
    return view('header');
});
Route::get('/footer', function () {
    return view('footer');
});

Route::get('/profile', [ProfileController::class, "index"])->middleware('auth')->name('profile');
Route::patch('/profile/update', [ProfileController::class, "update"])->name('profile.update');
Route::delete('/profile/delete', [ProfileController::class, "destroy"])->name('destroy');
Route::get('/login', [ProfileController::class, "login"])->name('login');
Route::post('/login/store', [ProfileController::class, "loginStore"])->name('loginStore');