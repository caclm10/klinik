<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $now = Carbon::now();

        $totalPatients = Patient::count();
        $totalRevenue = Transaction::sum('amount') ?? 0;

        $schedules = Schedule::with(['patient', 'practitioner'])
            ->whereMonth('schedule_date', $now->month)
            ->whereYear('schedule_date', $now->year)
            ->orderBy('schedule_date')
            ->orderBy('start_time')
            ->limit(5)
            ->get();

        $doctors = User::with('roles')
            ->whereHas('roles', function ($query): void {
                $query->where('name', 'dokter');
            })
            ->orderBy('name')
            ->limit(3)
            ->get();

        $nurses = User::with('roles')
            ->whereHas('roles', function ($query): void {
                $query->where('name', 'perawat');
            })
            ->orderBy('name')
            ->limit(2)
            ->get();

        $staff = $doctors->merge($nurses)->sortBy('name')->values();

        $visits = collect();
        for ($month = 1; $month <= 12; $month++) {
            $date = $now->copy()->month($month)->startOfMonth();
            $visits->push((object) [
                'month' => $month,
                'year' => $now->year,
                'month_name' => $date->translatedFormat('F'),
                'male' => 0,
                'female' => 0,
            ]);
        }

        Schedule::query()
            ->join('patients', 'schedules.patient_id', '=', 'patients.id')
            ->selectRaw('MONTH(schedules.schedule_date) as month, patients.gender, COUNT(*) as total')
            ->whereYear('schedules.schedule_date', $now->year)
            ->groupBy('month', 'patients.gender')
            ->orderBy('month')
            ->get()
            ->each(function ($item) use ($visits): void {
                $visit = $visits->firstWhere('month', (int) $item->month);

                if (! $visit) {
                    return;
                }

                if ($item->gender === 'L') {
                    $visit->male = (int) $item->total;
                }

                if ($item->gender === 'P') {
                    $visit->female = (int) $item->total;
                }
            });

        return view('pages.dashboard', [
            'monthName' => $now->translatedFormat('F'),
            'year' => $now->year,
            'totalPatients' => $totalPatients,
            'totalRevenue' => $totalRevenue,
            'schedules' => $schedules,
            'staff' => $staff,
            'visits' => $visits,
        ]);
    }
}
