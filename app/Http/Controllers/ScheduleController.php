<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $months = Schedule::query()
            ->selectRaw('YEAR(schedule_date) as year, MONTH(schedule_date) as month, COUNT(*) as total')
            ->when($search, function ($query, $search): void {
                $query->whereHas('patient', function ($query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->groupBy('year', 'month')
            ->orderByDesc('year')
            ->orderByDesc('month')
            ->get()
            ->map(function ($item) {
                return (object) [
                    'year' => $item->year,
                    'month' => $item->month,
                    'month_name' => Carbon::createFromDate($item->year, $item->month, 1)->translatedFormat('F'),
                    'total' => $item->total,
                ];
            });

        return view('pages.schedules.index', [
            'months' => $months,
            'search' => $search,
        ]);
    }

    public function indexByMonth(Request $request, string $month, string $year): View
    {
        $prev = '/jadwal-terapi';

        $schedules = Schedule::with(['patient', 'practitioner'])
            ->whereMonth('schedule_date', $month)
            ->whereYear('schedule_date', $year)
            ->when($request->query('search'), function ($query, $search): void {
                $query->whereHas('patient', function ($query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->orderBy('schedule_date')
            ->orderBy('start_time')
            ->paginate(10)
            ->withQueryString();

        return view('pages.schedules.month', [
            'month' => $month,
            'year' => $year,
            'monthName' => Carbon::createFromDate($year, $month, 1)->translatedFormat('F'),
            'schedules' => $schedules,
            'search' => $request->query('search'),
            'prev' => $prev,
        ]);
    }

    public function create(): View
    {
        $prev = request()->query('prev', '/jadwal-terapi');

        return view('pages.schedules.create', [
            'prev' => $prev,
        ]);
    }

    public function store(StoreScheduleRequest $request): RedirectResponse
    {
        $schedule = Schedule::create($request->validated());

        return redirect()->to("/jadwal-terapi/{$schedule->schedule_date->format('m-Y')}")
            ->with('success', 'Jadwal terapi berhasil ditambahkan.');
    }

    public function show(Schedule $schedule): View
    {
        return view('pages.schedules.show', [
            'schedule' => $schedule->load(['patient', 'practitioner']),
        ]);
    }

    public function edit(Schedule $schedule): View
    {
        $prev = request()->query('prev', "/jadwal-terapi/{$schedule->schedule_date->format('m-Y')}");

        return view('pages.schedules.edit', [
            'schedule' => $schedule->load(['patient', 'practitioner']),
            'prev' => $prev,
        ]);
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule): RedirectResponse
    {
        $schedule->update($request->validated());

        return redirect()->to("/jadwal-terapi/{$schedule->schedule_date->format('m-Y')}")
            ->with('success', 'Jadwal terapi berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule): RedirectResponse
    {
        $monthYear = $schedule->schedule_date->format('m-Y');
        $schedule->delete();

        return redirect()->to("/jadwal-terapi/{$monthYear}")
            ->with('success', 'Jadwal terapi berhasil dihapus.');
    }

    public function download(Schedule $schedule): Response
    {
        $pdf = Pdf::loadView('pdf.schedule', [
            'schedule' => $schedule->load(['patient', 'practitioner']),
        ]);

        return $pdf->download("jadwal-{$schedule->id}.pdf");
    }
}
