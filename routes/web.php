<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', [ProfileController::class, "index"])->middleware('auth')->name('profile');
Route::patch('/profile/update', [ProfileController::class, "update"])->name('profile.update');
Route::delete('/profile/delete', [ProfileController::class, "destroy"])->name('destroy');
Route::get('/login', [ProfileController::class, "login"])->name('login');
Route::post('/login/store', [ProfileController::class, "loginStore"])->name('loginStore');