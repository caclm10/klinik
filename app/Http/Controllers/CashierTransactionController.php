<?php

namespace App\Http\Controllers;

use App\Actions\TempAction;
use Illuminate\View\View;

class CashierTransactionController extends Controller
{
    public function index(): View
    {
        return view('pages.cashier.index');
    }

    public function indexByMonth(TempAction $action, string $month, string $year): View
    {
        return view('pages.cashier.month', [
            'month' => $month,
            'year' => $year,
            'patients' => $action->tenPatients(),
        ]);
    }

    public function show(TempAction $tempAction, string $id): View
    {
        return view('pages.cashier.show', [
            'patient' => $tempAction->patientWithTherapy(),
        ]);
    }
}
