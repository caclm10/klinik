<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CashierTransactionController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);

});

Route::middleware(['auth'])->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    });

    Route::get('/account', [AccountController::class, 'index']);
    Route::patch('/account', [AccountController::class, 'update']);

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

    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/tambah', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit');
    Route::patch('/staff/{staff}', [StaffController::class, 'update'])->name('staff.update');
    Route::get('/staff/{staff}', [StaffController::class, 'show'])->name('staff.show');
});
