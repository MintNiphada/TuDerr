<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [CourseController::class,'index']);
Route::get('/course/{id}', [CourseController::class,'show']);

Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::get('/admin/purchases', [AdminController::class,'purchases']);
Route::get('/admin/purchase/{id}', [AdminController::class,'purchaseDetail']);
Route::post('/admin/approve/{id}', [AdminController::class,'approve']);
Route::post('/admin/reject/{id}', [AdminController::class,'reject']);

Route::get('/purchase/{id}', [PurchaseController::class,'buy']);
Route::post('/purchase/confirm', [PurchaseController::class,'confirm']);

Route::get('/mycourses',[StudentController::class,'myCourses']);


