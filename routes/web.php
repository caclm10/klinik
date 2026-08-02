<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CashierTransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);

});

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'index']);
    Route::patch('/account', [AccountController::class, 'update']);

    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');

    Route::get('/data-pasien', [PatientController::class, 'index'])->name('patients.index');

    Route::get('/jadwal-terapi', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/jadwal-terapi/{month}-{year}', [ScheduleController::class, 'indexByMonth'])
        ->where([
            'month' => '0?[1-9]|1[0-2]',
            'year' => '20[0-9]{2}',
        ])->name('schedules.month');

    Route::middleware(['can:view-dashboard'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/data-pasien/tambah', [PatientController::class, 'create'])->name('patients.create');
        Route::post('/data-pasien', [PatientController::class, 'store'])->name('patients.store');
        Route::get('/data-pasien/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
        Route::patch('/data-pasien/{patient}', [PatientController::class, 'update'])->name('patients.update');
        Route::delete('/data-pasien/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');

        Route::get('/jadwal-terapi/buat', [ScheduleController::class, 'create'])->name('schedules.create');
        Route::post('/jadwal-terapi', [ScheduleController::class, 'store'])->name('schedules.store');

        Route::get('/jadwal-terapi/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
        Route::patch('/jadwal-terapi/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
        Route::delete('/jadwal-terapi/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

        Route::get('/kasir', [CashierTransactionController::class, 'index'])->name('cashier.index');
        Route::get('/kasir/{month}-{year}', [CashierTransactionController::class, 'indexByMonth'])
            ->where([
                'month' => '0?[1-9]|1[0-2]',
                'year' => '20[0-9]{2}',
            ])->name('cashier.month');
        Route::get('/kasir/{month}-{year}/download', [CashierTransactionController::class, 'download'])
            ->where([
                'month' => '0?[1-9]|1[0-2]',
                'year' => '20[0-9]{2}',
            ])->name('cashier.download');
        Route::get('/kasir/{schedule}', [CashierTransactionController::class, 'show'])->name('cashier.show');
        Route::post('/kasir/{schedule}', [CashierTransactionController::class, 'store'])->name('cashier.store');

        Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
        Route::get('/staff/tambah', [StaffController::class, 'create'])->name('staff.create');
        Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
        Route::get('/staff/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit');
        Route::patch('/staff/{staff}', [StaffController::class, 'update'])->name('staff.update');
        Route::get('/staff/{staff}', [StaffController::class, 'show'])->name('staff.show');
        Route::get('/staff/{staff}/download', [StaffController::class, 'download'])->name('staff.download');
    });

    Route::get('/data-pasien/{patient}', [PatientController::class, 'show'])->name('patients.show');
    Route::get('/data-pasien/{patient}/download', [PatientController::class, 'download'])->name('patients.download');

    Route::get('/jadwal-terapi/{schedule}', [ScheduleController::class, 'show'])->name('schedules.show');
    Route::get('/jadwal-terapi/{schedule}/download', [ScheduleController::class, 'download'])->name('schedules.download');
});
