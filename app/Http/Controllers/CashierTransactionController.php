<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Schedule;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CashierTransactionController extends Controller
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

        return view('pages.cashier.index', [
            'months' => $months,
            'search' => $search,
        ]);
    }

    public function indexByMonth(Request $request, string $month, string $year): View
    {
        $schedules = Schedule::with(['patient', 'practitioner', 'transaction'])
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

        return view('pages.cashier.month', [
            'month' => $month,
            'year' => $year,
            'monthName' => Carbon::createFromDate($year, $month, 1)->translatedFormat('F'),
            'schedules' => $schedules,
            'search' => $request->query('search'),
        ]);
    }

    public function show(Schedule $schedule): View
    {
        return view('pages.cashier.show', [
            'schedule' => $schedule->load(['patient', 'practitioner', 'transaction']),
        ]);
    }

    public function store(StoreTransactionRequest $request, Schedule $schedule): RedirectResponse
    {
        Transaction::create([
            'schedule_id' => $schedule->id,
            'payment_method' => $request->input('payment_method'),
            'amount' => $request->input('amount'),
            'paid_by' => $request->input('paid_by'),
            'paid_at' => $request->input('paid_at') ?? now(),
            'note' => $request->input('note'),
        ]);

        return redirect()->to("/kasir/{$schedule->schedule_date->format('m-Y')}")
            ->with('success', 'Pembayaran berhasil dicatat.');
    }
}
