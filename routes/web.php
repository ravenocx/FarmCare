<?php
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AplicantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'landingPage'])->name("landing-page");

Route::get('/login', [AuthController::class, 'login'])->name('login.form');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'userRegister'])->name('user.register.form');
Route::post('/register', [AuthController::class, 'userRegisterSubmit'])->name('user.register.submit');

Route::get('/register/veterinarian', [AuthController::class, 'veterinarianRegister'])->name('veterinarian.register.form');
Route::post('/register/veterinarian', [AuthController::class, 'veterinarianRegisterSubmit'])->name('veterinarian.register.submit');

Route::get('/admin_login', [AuthController::class, 'adminLogin'])->name("admin.login");
Route::post('/admin_login', [AuthController::class, 'adminLoginSubmit'])->name('admin.login.submit');

Route::middleware(['AuthSession'])->group(function () {
    Route::get('/home', function () {
        return view('pages.user.index');
    })->name("user.home");

    Route::get('/consultation', [ConsultationController::class, 'index'])->name('user.consultation');
    Route::get('/consultation/{specialist}', [ConsultationController::class, 'getDoctorBySpecialist'])->name('user.consultation.specialist');

    Route::get('/profile', [UserController::class, 'showProfile'])->name('user.profile');

    
    Route::get('/profile/edit', [UserController::class, 'editProfileForm'])->name('user.profile.edit.form');
    Route::post('/profile/edit', [UserController::class, 'updateProfile'])->name('user.profile.edit.submit');
});

Route::middleware(['AdminAuthSession'])->prefix('admin')->group(function () {
    Route::get('/', [AplicantController::class, 'index'])->name("admin.index");

    // Route::get('/applicant', function () {
    //     return view('pages.admin.vete-management.applicant');
    // })->name("admin.management.applicant");
    Route::get('/applicant', [AplicantController::class, 'aplicant'])->name("admin.management.applicant");
    Route::put('/veterinarians/update-status/{id}', [AplicantController::class, 'updateStatus'])->name('admin.management.applicant.update-status');



    Route::get('/veterinarian', [AplicantController::class, 'veterinarian'])->name("admin.management.veterinarian");
    Route::get('/veterinarian/{id}', [AplicantController::class, 'veterinarianDetail'])->name("admin.management.veterinarian.detail");
    Route::get('/veterinarian/edit/{id}', [AplicantController::class, 'editVeterinarianForm'])->name("admin.management.veterinarian.edit");
    Route::put('/veterinarian/update/{id}', [AplicantController::class, 'updateVeterinarian'])->name('admin.management.veterinarian.update');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name("dashboard")->middleware('VeterinarianAuthSession');
