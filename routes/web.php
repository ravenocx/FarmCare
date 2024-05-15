<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\OrderHistoryController;

Route::get('/', function () {return view('dashboard');});

Route::get('/', function () {return view('detail');});

Route::resource('orderhistories', OrderHistoryController::class);