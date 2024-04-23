<?php
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;

Route::get('/consultation', [ConsultationController::class, 'showPage'])->name('consultation');
Route::get('/', function () {
    return view('pages.login.index');
})->name('login');

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

Route::get('/register', function () {
    return view('pages.user.register.index');
})->name('register.user');