<?php
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;

Route::get('/consultation', [ConsultationController::class, 'showPage'])->name('consultation');
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/footer', function () {
    return view('footer');
});

