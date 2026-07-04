<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/data-pasien', [PatientController::class, 'index']);

Route::get('/data-pasien/tambah', function () {
    return view('tambah-data-pasien');
});
