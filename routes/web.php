<?php
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;

Route::get('/consultation', [ConsultationController::class, 'showPage'])->name('consultation');
Route::get('/', function () {
    return view('Login User.loginuser');
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

