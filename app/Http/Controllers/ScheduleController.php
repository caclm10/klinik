<?php

namespace App\Http\Controllers;

use App\Actions\TempAction;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(): View
    {
        return view('jadwal-terapi');
    }

    public function indexByMonth(TempAction $action, string $month, string $year): View
    {
        return view('jadwal-terapi-bulan-tahun', [
            'month' => $month,
            'year' => $year,
            'patients' => $action->tenPatients(),
        ]);
    }

    public function create(TempAction $action): View
    {
        $prev = request()->query('prev', '/jadwal-terapi');

        return view('buat-jadwal-terapi', [
            'patients' => $action->fivePatients(),
            'prev' => $prev,
        ]);
    }

    public function show(TempAction $tempAction, string $id): View
    {
        return view('detail-jadwal-terapi', [
            'patient' => $tempAction->patientWithTherapy(),
        ]);
    }
}
