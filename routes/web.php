<?php
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'landingPage'])->name("landing-page");

Route::get('/login',[AuthController::class, 'login'] )->name('login.form');
Route::post('/login',[AuthController::class, 'loginSubmit'] )->name('login.submit');

Route::get('/logout',[AuthController::class, 'logout'] )->name('logout');

Route::get('/register',[AuthController::class, 'userRegister'] )->name('user.register.form');
Route::post('/register',[AuthController::class, 'userRegisterSubmit'] )->name('user.register.submit');

Route::get('/register/veterinarian',[AuthController::class, 'veterinarianRegister'] )->name('veterinarian.register.form');
Route::post('/register/veterinarian',[AuthController::class, 'veterinarianRegisterSubmit'] )->name('veterinarian.register.submit');

Route::get('/admin_login', [AuthController::class, 'adminLogin'] )->name("admin.login");
Route::post('/admin_login',[AuthController::class, 'adminLoginSubmit'] )->name('admin.login.submit');

Route::middleware(['AuthSession'])->group(function(){
    Route::get('/home', function () {
        return view('pages.user.index');
    })->name("user.home");
    
    Route::get('/consultation', [ConsultationController::class, 'index'])->name('user.consultation');
});

Route::middleware(['AdminAuthSession'])->prefix('admin')->group(function(){
    Route::get('/', function () {
        return view('pages.admin.vete-management.index');
    })->name("admin.index");

    Route::get('/applicant', function () {
        return view('pages.admin.vete-management.applicant');
    })->name("admin.management.applicant");

    Route::get('/veterinarian', function () {
        return view('pages.admin.vete-management.veterinarian');
    })->name("admin.management.veterinarian");

    Route::get('/edit', function () {
        return view('pages.admin.vete-management.vete-edit');
    })->name("admin.management.veterinarian.edit");
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name("dashboard")->middleware('VeterinarianAuthSession');

