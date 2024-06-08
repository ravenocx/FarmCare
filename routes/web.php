<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;


use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\VeterConsultationController;

use App\Http\Controllers\OfflineConsultationController;
use App\Http\Controllers\UserReservationController;
use App\Http\Controllers\VeterinarianController;

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

    // ! FAJAR SPRINT 3

    Route::get('/customer-offline-reservation', [UserReservationController::class, 'index'])->name('user.reservation');

    Route::get('/veterinarian/{id}/schedule', [UserReservationController::class, 'show_veterinarian_schedule']);

    Route::post('/make-offline-reservation', [UserReservationController::class, 'store']);

    Route::get('/confirm-offline-reservation/{id}', [UserReservationController::class, 'confirm_order'])->name('confirm_offline_reservation');

    Route::prefix('/consultation')->group(function(){
        Route::get('/', [ConsultationController::class, 'index'])->name('user.consultation');
        Route::get('/specialist/{specialist}', [ConsultationController::class, 'getDoctorBySpecialist'])->name('user.consultation.specialist');
        Route::get('/veterinarian/{id}', [ConsultationController::class, 'getVeterinarianDetails'])->name('user.consultation.veterinarian');
        Route::get('/veterinarian/{id}/payment', [ConsultationController::class, 'getVeterinarianOrderDetails'])->name('user.consultation.veterinarian.payment');
        Route::post('/veterinarian/{id}/payment', [ConsultationController::class, 'createConsultationOrder'])->name('user.consultation.veterinarian.payment.submit');
        Route::get('/order/{id}', [ConsultationController::class, 'getConsultationOrder'])->name('user.consultation.order');
    });

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
    Route::get('/', [VeterinarianController::class, 'show_dashboard'])->name('veterinarian.index');

    // ! Fajar SPRINT 2

    Route::get('/offline-reservation', [OfflineConsultationController::class, 'index']);

    Route::get('/create-offline-reservation', [OfflineConsultationController::class, 'show_create_form']);

    Route::post('/create-offline-reservation', [OfflineConsultationController::class, 'store']);

    Route::get('/offline-reservation/{id}/edit', [OfflineConsultationController::class, 'edit']);
    Route::patch('/offline-reservation/{id}/update', [OfflineConsultationController::class, 'update']);

    Route::delete('/offline-reservation/{id}/delete', [OfflineConsultationController::class, 'destroy_schedule']);


    

    // ! FAJAR SPRINT 3 Veterinarian

    Route::patch('/update-offline-reservation/{id}', [OfflineConsultationController::class, 'update_offline_reservation']);

    Route::get('/offline-reservation', [OfflineConsultationController::class, 'index']);

    Route::get('create-offline-reservation', [OfflineConsultationController::class, 'show_create_form']);

    Route::post('/create-offline-reservation', [OfflineConsultationController::class, 'store']);

    Route::get('/offline-reservation/{id}/edit', [OfflineConsultationController::class, 'edit']);
    Route::patch('/offline-reservation/{id}/update', [OfflineConsultationController::class, 'update']);

    Route::delete('/offline-reservation/{id}/delete', [OfflineConsultationController::class, 'destroy_schedule']);

    Route::get('/offline-reservation/{id}', [OfflineConsultationController::class, 'detail_order']);
    

    

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

