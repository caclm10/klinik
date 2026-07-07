<?php

namespace App\Http\Controllers;

use App\Actions\TempAction;
use Illuminate\View\View;

class CashierTransactionController extends Controller
{
    public function index(): View
    {
        return view('kasir');
    }

    public function indexByMonth(TempAction $action, string $month, string $year): View
    {
        return view('kasir-bulan-tahun', [
            'month' => $month,
            'year' => $year,
            'patients' => $action->tenPatients(),
        ]);
    }

    public function show(TempAction $tempAction, string $id): View
    {
        return view('detail-kasir', [
            'patient' => $tempAction->patientWithTherapy(),
        ]);
    }
}
