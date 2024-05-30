<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AplicantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\VeterConsultationController;
use App\Http\Controllers\VeterProfileController;

Route::get('/', [AuthController::class, 'landingPage'])->name("landing-page");



Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('/login', [AuthController::class, 'login'])->name('login.form');

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
    Route::get('/consultation/specialist/{specialist}', [ConsultationController::class, 'getDoctorBySpecialist'])->name('user.consultation.specialist');
    Route::get('/consultation/veterinarian/{id}', [ConsultationController::class, 'getVeterinarianDetails'])->name('user.consultation.veterinarian');
    Route::get('/consultation/veterinarian/{id}/order', [ConsultationController::class, 'getVeterinarianOrderDetails'])->name('user.consultation.veterinarian.order');

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
    Route::delete('/veterinarian/delete/{id}', [AplicantController::class, 'deleteVeterinarian'])->name('admin.management.veterinarian.delete');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name("dashboard")->middleware('VeterinarianAuthSession');
Route::middleware(['VeterinarianAuthSession'])->prefix('veterinarian')->group(function(){
    Route::get('/', function () {
        return view('pages.veterinarian.dashboard.index');
    })->name("veterinarian.index");
    Route::prefix('/profile')->group(function(){
        Route::get('/',[VeterProfileController::class, 'showProfile'])->name("veterinarian.profile");
        Route::get('/edit',[VeterProfileController::class, 'editProfileForm'])->name("veterinarian.profile.edit");
        });
    Route::prefix('/consultation')->group(function(){
        Route::get('/',[VeterConsultationController::class, 'index'])->name("veterinarian.consultation");
        Route::patch('/status/edit/{id}',[VeterConsultationController::class, 'editConsultationStatus'])->name("veterinarian.consultation.status.edit.submit");
        Route::get('/order/detail/{id}',[VeterConsultationController::class, 'getConsultationOrderDetails'])->name("veterinarian.consultation.order.detail");

        Route::get('/schedule',[VeterConsultationController::class, 'showAllConsultationSchedules'])->name("veterinarian.consultation.schedule");
        Route::get('/schedule/create',[VeterConsultationController::class, 'createSchedule'])->name("veterinarian.consultation.schedule.create");
        Route::post('/schedule/create',[VeterConsultationController::class, 'createScheduleSubmit'])->name("veterinarian.consultation.schedule.create.submit");
        Route::get('/schedule/edit/{id}',[VeterConsultationController::class, 'editServiceSchedule'])->name("veterinarian.consultation.schedule.edit");
        Route::patch('/schedule/edit/{id}',[VeterConsultationController::class, 'editServiceScheduleSubmit'])->name("veterinarian.consultation.schedule.edit.submit");
        Route::delete('/schedule/delete/{id}',[VeterConsultationController::class, 'deleteServiceSchedule'])->name("veterinarian.consultation.schedule.delete");
    });


});