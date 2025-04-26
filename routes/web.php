<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.index');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard',
    ]);
})->name('dashboard');

Route::get('/patient', function () {
    return view('patient.index', [
        'title' => 'Patient',
    ]);
})->name('patient.index');

Route::get('/program', function () {
    return view('program.index', [
        'title' => 'Program',
    ]);
})->name('program.index');