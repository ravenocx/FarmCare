<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\VeterConsultationController;
use App\Http\Controllers\OrderHistoryController;


Route::get('/', [AuthController::class, 'landingPage'])->name("landing-page");
Route::get('/faq', function () {
    return view('pages.faq.index');
})->name("faq");


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
    Route::get('/consultation/specialist/{specialist}', [ConsultationController::class, 'getDoctorBySpecialist'])->name('user.consultation.specialist');
    Route::get('/consultation/veterinarian/{id}', [ConsultationController::class, 'getVeterinarianDetails'])->name('user.consultation.veterinarian');
    Route::get('/consultation/veterinarian/{id}/order', [ConsultationController::class, 'getVeterinarianOrderDetails'])->name('user.consultation.veterinarian.order');

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


Route::middleware(['VeterinarianAuthSession'])->prefix('veterinarian')->group(function(){
    Route::get('/', function () {
        return view('pages.veterinarian.dashboard.index');
    })->name("veterinarian.index");

    Route::prefix('/consultation')->group(function(){
        Route::get('/',[VeterConsultationController::class, 'index'])->name("veterinarian.consultation");

        Route::get('/schedule/create',[VeterConsultationController::class, 'createSchedule'])->name("veterinarian.consultation.schedule.create");
        Route::post('/schedule/create',[VeterConsultationController::class, 'createScheduleSubmit'])->name("veterinarian.consultation.schedule.create.submit");

    });
    

    // Route::prefix('/orderhistory')->group(function(){
    //     Route::get('/', [OrderHistoryController::class, 'index'])->name("veterinarian.orderhistory");
    //     Route::get('/detail', [OrderHistoryController::class, 'detailOrder'])->name("veterinarian.orderhistory.detail");
    // });
    
    Route::prefix('/orderhistory')->group(function(){
        Route::get('/', [OrderHistoryController::class, 'index'])->name("veterinarian.orderhistory");
        Route::get('/detail', [OrderHistoryController::class, 'detailOrder'])->name("veterinarian.orderhistory.detail");
    });

    // Route::resource('orderhistory', OrderHistoryController::class);


    // Route::resource('offschedule', OffscheduleController::class);
    
});
