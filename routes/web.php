<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
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

    Route::view('/patient', 'patient.index', ['title' => 'Patient'])->name('patient.index');
    Route::view('/program', 'program.index', ['title' => 'Program'])->name('program.index');
});