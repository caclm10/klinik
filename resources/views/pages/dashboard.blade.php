<x-layout.dashboard>
    <h1 class="font-extrabold text-3xl">Selamat Datang!</h1>

    <div class="flex gap-4">
        <div class="bg-card p-6 shadow rounded-2xl flex flex-col gap-8">
            <div class="flex items-center justify-between">
                <div class="flex flex-col gap-1">
                    <h2 class="font-semibold">Laporan Bulanan</h2>
                    <p class="text-muted-foreground text-sm">{{ $monthName }} {{ $year }}</p>
                </div>
            </div>

            <div class="flex gap-4">
                <div class="bg-muted p-5 flex flex-col gap-4 rounded-2xl min-w-[160px]">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="size-10">
                            <path d="M17.925 20.056a6 6 0 0 0-11.851.001" />
                            <circle cx="12" cy="11" r="4" />
                            <circle cx="12" cy="12" r="10" />
                        </svg>
                    </div>

                    <div class="flex flex-col gap-1">
                        <p class="font-bold text-2xl">{{ $totalPatients }}</p>

                        <p class="text-sm text-nowrap">Total Pasien</p>
                    </div>
                </div>

                <div class="bg-foreground text-white p-5 flex flex-col gap-4 rounded-2xl">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="size-10">
                            <path d="M13.744 17.736a6 6 0 1 1-7.48-7.48" />
                            <path d="M15 6h1v4" />
                            <path d="m6.134 14.768.866-.5 2 3.464" />
                            <circle cx="16" cy="8" r="6" />
                        </svg>
                    </div>

                    <div class="flex flex-col gap-1">
                        <p class="inline-flex items-end font-bold">
                            <span class="text-xs leading-6">Rp</span>
                            <span class="text-2xl">{{ number_format($totalRevenue, 0, ',', '.') }}</span>
                        </p>

                        <p class="text-sm">Total Pendapatan</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-card p-6 shadow rounded-2xl flex flex-col gap-8 grow">
            <div class="flex items-center justify-between">
                <div class="flex flex-col gap-1">
                    <h2 class="font-semibold">Data Kunjungan Pasien</h2>
                </div>

                <p class="text-sm text-muted-foreground">{{ $year }}</p>
            </div>

            <div class="grow min-h-64">
                <canvas id="visitsChart" data-labels="{{ json_encode($visits->pluck('month_name')->values()) }}"
                    data-male="{{ json_encode($visits->pluck('male')->values()) }}"
                    data-female="{{ json_encode($visits->pluck('female')->values()) }}"></canvas>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-[minmax(0,1fr)_330px] items-start gap-4">
        <div class="bg-card shadow rounded-2xl flex flex-col gap-4">
            <div class="flex items-center justify-between p-6">
                <div class="flex flex-col gap-1">
                    <h2 class="font-semibold">Jadwal Terapi</h2>
                    <p class="text-muted-foreground text-sm">{{ $monthName }} {{ $year }}</p>
                </div>

                <a href="/jadwal-terapi"
                    class="inline-flex items-center gap-2 text-sm px-3 py-2 border border-[#C3D3E2] rounded-lg font-medium">
                    <span>Selengkapnya</span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-3">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </a>
            </div>

            <div class="overflow-x-auto pb-6">
                <table class="table table--sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keluhan</th>
                            <th>Treatment</th>
                            <th>Jadwal</th>
                            <th>Waktu</th>
                            <th>Perawat/Dokter</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($schedules as $schedule)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-nowrap">{{ $schedule->patient->name }}</td>
                                <td class="text-center text-nowrap">{{ $schedule->complaint }}</td>
                                <td class="text-center text-nowrap">{{ $schedule->treatment }}</td>
                                <td class="text-center text-nowrap">{{ $schedule->schedule_date->format('d/m/Y') }}
                                </td>
                                <td class="text-center text-nowrap">{{ $schedule->start_time->format('H:i') }} -
                                    {{ $schedule->end_time->format('H:i') }} WIB</td>
                                <td class="text-center text-nowrap">{{ $schedule->practitioner->name }}</td>
                                <td class="text-center text-nowrap capitalize">{{ $schedule->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted-foreground py-6">
                                    Belum ada jadwal terapi bulan ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-card shadow rounded-2xl overflow-hidden">
            <div class="p-6 bg-foreground text-white">
                <h2 class="text-xl font-bold text-nowrap">Daftar Dokter dan Perawat</h2>
            </div>

            <div class="p-6">
                @if ($staff->isEmpty())
                    <p class="text-sm text-muted-foreground">Belum ada data dokter/perawat.</p>
                @else
                    <ul class="flex flex-col gap-4 text-sm font-semibold">
                        @foreach ($staff as $item)
                            <li class="grid grid-cols-[minmax(0,1fr)_65px] gap-4">
                                <p>{{ $item->name }}</p>
                                <p class="text-center capitalize {{ $item->role === 'dokter' ? 'text-primary' : '' }}">
                                    {{ $item->role }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-layout.dashboard>
