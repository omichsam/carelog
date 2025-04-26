<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\EnrollmentController;
use App\Http\Controllers\Web\PatientController;
use App\Http\Controllers\Web\ProgramController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('post/auth', 'authenticate')->name('login.post');
    Route::get('/', 'index')->name('login');
});

Route::middleware('web.auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(PatientController::class)->group(function () {
        Route::get('/patient', 'index')->name('patient.index');
        Route::prefix('/patient/post')->group(function () {
            Route::post('/store', 'store')->name('patient.store');
            Route::put('/patient/{id}', 'update')->name('patient.update');
        });
    });

    Route::controller(ProgramController::class)->group(function () {
        Route::get('/program', 'index')->name('program.index');
        Route::prefix('/program/post')->group(function () {
            Route::post('/store', 'store')->name('program.store');
            Route::put('/program/{id}', 'update')->name('program.update');
            Route::delete('/program/{id}', 'destroy')->name('program.destroy');
        });
    });


    Route::controller(EnrollmentController::class)->group(function () {
        Route::prefix('/enroll/post')->group(function () {
            Route::post('/store/{id}', 'enroll')->name('patient.enroll');
            Route::put('/update/{id}', 'update')->name('enrollment.update');

        });
    });
});