<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CashierTransactionController;
use App\Http\Controllers\DokterPerawatController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::get('/account', [AccountController::class, 'index']);

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/data-pasien', [PatientController::class, 'index']);
Route::get('/data-pasien/tambah', [PatientController::class, 'create']);
Route::get('/data-pasien/{id}/edit', [PatientController::class, 'edit']);
Route::get('/data-pasien/{id}', [PatientController::class, 'show']);

Route::get('/jadwal-terapi', [ScheduleController::class, 'index']);
Route::get('/jadwal-terapi/buat', [ScheduleController::class, 'create']);
Route::get('/jadwal-terapi/{month}-{year}', [ScheduleController::class, 'indexByMonth'])
    ->where([
        'month' => '0?[1-9]|1[0-2]',
        'year' => '20[0-9]{2}',
    ]);
Route::get('/jadwal-terapi/{id}/edit', [ScheduleController::class, 'edit']);
Route::get('/jadwal-terapi/{id}', [ScheduleController::class, 'show']);

Route::get('/kasir', [CashierTransactionController::class, 'index']);
Route::get('/kasir/{month}-{year}', [CashierTransactionController::class, 'indexByMonth'])
    ->where([
        'month' => '0?[1-9]|1[0-2]',
        'year' => '20[0-9]{2}',
    ]);
Route::get('/kasir/{id}', [CashierTransactionController::class, 'show']);

Route::get('/dokter-perawat', [DokterPerawatController::class, 'index']);
Route::get('/dokter-perawat/tambah', [DokterPerawatController::class, 'create']);
Route::get('/dokter-perawat/{id}', [DokterPerawatController::class, 'show']);
