<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\VeterConsultationController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\MedicDelivController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\OrderController;


Route::get('/', [AuthController::class, 'landingPage'])->name("landing-page");

Route::get('/faq', [FaqController::class, 'getFAQPage'])->name("faq");

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
    Route::get('/home', [DashboardController::class, 'index'] )->name('user.home');
    Route::get('/home/veterinarians', [DashboardController::class, 'listVeterinarians'])->name('user.dashboard.list');

    Route::prefix('/order')->group(function(){
        Route::get('/history', [OrderController::class, 'orderHistory'])->name('user.order.history');
        Route::get('/details/{id}', [OrderController::class, 'orderHistoryDetail'])->name('user.order.details');
        Route::get('/medicine', [MedicDelivController::class, 'index'])->name('user.medicdeliv.index');
        Route::get('/order-history', [MedicDelivController::class, 'orderHistory'])->name('user.order-history');


    });

    Route::prefix('/article')->group(function(){
        Route::get('/', [ArticleController::class, 'index'])->name('user.article');
        Route::post('/', [ArticleController::class, 'index'])->name('user.article.search');
        Route::get('/{id}', [ArticleController::class, 'detail'])->name('user.article.detail');
    });

    Route::prefix('/consultation')->group(function(){
        Route::get('/', [ConsultationController::class, 'index'])->name('user.consultation');
        Route::get('/specialist/{specialist}', [ConsultationController::class, 'getDoctorBySpecialist'])->name('user.consultation.specialist');
        Route::get('/veterinarian/{id}', [ConsultationController::class, 'getVeterinarianDetails'])->name('user.consultation.veterinarian');
        Route::get('/veterinarian/{id}/payment', [ConsultationController::class, 'getVeterinarianOrderDetails'])->name('user.consultation.veterinarian.payment');
        Route::post('/veterinarian/{id}/payment', [ConsultationController::class, 'createConsultationOrder'])->name('user.consultation.veterinarian.payment.submit');
        Route::get('/order/{id}', [ConsultationController::class, 'getConsultationOrder'])->name('user.consultation.order');
    });

    Route::prefix('/medicine')->group(function(){
        Route::get('/', [MedicDelivController::class, 'index'])->name('user.medicdeliv');
        Route::patch('/edit/address/{id}', [MedicDelivController::class, 'editAddress'])->name('user.medicdeliv.address.edit');
        Route::get('/upload/{id}', [MedicDelivController::class, 'upload'])->name('user.medicdeliv.upload');
        Route::patch('/upload/{id}', [MedicDelivController::class, 'uploadPaymentProof'])->name('user.medicdeliv.upload.submit');
        Route::get('/success/{id}', [MedicDelivController::class, 'success'])->name('user.medicdeliv.success');
        Route::get('/status/{id}', [MedicDelivController::class, 'status'])->name('user.medicdeliv.status');
        Route::put('/medicine/{id}/confirm-received', [MedicDelivController::class, 'confirmReceived'])->name('user.medicdeliv.confirm-received');

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
    Route::get('/', function () {
        return view('pages.veterinarian.dashboard.index');
    })->name("veterinarian.index");

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

    Route::prefix('/article')->group(function(){
        Route::get('/',[ArticleController::class, 'index'])->name("veterinarian.article.index");
        Route::get('/add',[ArticleController::class, 'create'])->name("veterinarian.article.create");
        Route::post('/add',[ArticleController::class, 'store'])->name("veterinarian.article.create.submit");
        Route::get('/edit/{id}',[ArticleController::class, 'edit'])->name("veterinarian.article.edit");
        Route::patch('/edit/{id}',[ArticleController::class, 'update'])->name("veterinarian.article.edit.submit");
        Route::delete('/delete/{id}',[ArticleController::class, 'destroy'])->name("veterinarian.article.delete");
    });    
    Route::prefix('/order')->group(function(){
        Route::get('/history', [OrderHistoryController::class, 'index'])->name("veterinarian.order.history");
        Route::get('/detail/{id}', [OrderHistoryController::class, 'detailOrder'])->name("veterinarian.order.detail");
    });
    
});