<?php

namespace App\Http\Controllers;

use App\Actions\TempAction;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(): View
    {
        return view('pages.schedules.index');
    }

    public function indexByMonth(TempAction $action, string $month, string $year): View
    {
        return view('pages.schedules.month', [
            'month' => $month,
            'year' => $year,
            'patients' => $action->tenPatients(),
        ]);
    }

    public function create(TempAction $action): View
    {
        $prev = request()->query('prev', '/jadwal-terapi');

        return view('pages.schedules.create', [
            'patients' => $action->fivePatients(),
            'prev' => $prev,
        ]);
    }

    public function edit(TempAction $tempAction, string $id): View
    {
        $prev = request()->query('prev', '/jadwal-terapi/02-2026');

        return view('pages.schedules.edit', [
            'patient' => $tempAction->patientWithTherapy(),
            'patients' => $tempAction->fivePatients(),
            'prev' => $prev,
        ]);
    }

    public function show(TempAction $tempAction, string $id): View
    {
        return view('pages.schedules.show', [
            'patient' => $tempAction->patientWithTherapy(),
        ]);
    }
}
