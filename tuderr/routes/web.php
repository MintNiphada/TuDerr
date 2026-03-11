<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApproveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('/course/{id}', [CourseController::class,'show'])->name('course.show');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('/admin/payments', [ApproveController::class,'payments'])->name('admin.payments');
        Route::get('/admin/payments/{id}', [ApproveController::class,'show'])->name('admin.payment.show');
        Route::put('/admin/approve/{id}', [ApproveController::class,'store'])->name('admin.payment.update');
    });

    Route::middleware('role:student')->group(function () {
        Route::get('/payment/{id}', [PaymentController::class,'buy'])->name('payment.buy');
        Route::post('/payment/{id}/confirm', [PaymentController::class,'store'])->name('payment.confirm');
        Route::get('/mycourses',[StudentController::class,'myCourses'])->name('student.mycourses');
        Route::get('/mycourses/{id}', [StudentController::class,'show'])->name('student.mycourses.show');
    });
});
/*
Route::get('/', [CourseController::class,'index']);
Route::get('/course/{id}', [CourseController::class,'show']);

Route::get('/admin/dashboard',[AdminController::class,'admin_dashboard']);
Route::get('/admin/payments', [ApproveController::class,'admin_payments']);
Route::get('/admin/purchase/{id}', [AdminController::class,'purchaseDetail']);
Route::post('/admin/approve/{id}', [AdminController::class,'approve']);
Route::post('/admin/reject/{id}', [AdminController::class,'reject']);

Route::get('/purchase/{id}', [PurchaseController::class,'buy']);
Route::post('/purchase/confirm', [PurchaseController::class,'confirm']);

Route::get('/mycourses',[StudentController::class,'myCourses']);

*/
