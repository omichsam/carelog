<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\PatientController;
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
        Route::prefix('/post')->group(function () {
            Route::post('/store', 'store')->name('patient.store');
            Route::put('/patient/{id}', 'update')->name('patient.update');
            Route::post('/patient/{id}/enroll', 'enroll')->name('patient.enroll');
        });
    });

    Route::view('/program', 'program.index', ['title' => 'Program'])->name('program.index');
});