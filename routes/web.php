<?php
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\OrderHistoryController;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/header', function () {
    return view('header');
});
Route::get('/footer', function () {
    return view('footer');
});

Route::get('/', function () {return view('detail');});

Route::resource('orderhistories', OrderHistoryController::class);