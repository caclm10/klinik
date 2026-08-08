<x-layout.dashboard>
    <x-ui.alert.success />

    <div>
        <a href="/jadwal-terapi" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <x-ui.page-header title="Jadwal Terapi {{ $monthName }} {{ $year }}"
        search-placeholder="Cari nama pasien" search-action="{{ url('/jadwal-terapi/' . $month . '-' . $year) }}"
        search-value="{{ $search }}">
        <x-slot:actions>
            @can('view-dashboard')
                <a href="/jadwal-terapi/buat?prev=/jadwal-terapi/{{ $month }}-{{ $year }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg font-medium bg-primary text-primary-foreground px-3 h-10 text-sm shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="size-4">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>

                    <span class="">Buat Jadwal</span>
                </a>
            @endcan
        </x-slot:actions>
    </x-ui.page-header>

    <div class="flex flex-col gap-4">
        <div class="overflow-x-auto py-2">
            <table class="table table--rounded border-separate border-spacing-y-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Keluhan</th>
                        <th>Treatment</th>
                        <th>Jadwal</th>
                        <th>Waktu</th>
                        <th>Perawat/Dokter</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr class="bg-white even:bg-muted">
                            <td class="text-center">{{ $schedules->firstItem() + $loop->index }}</td>
                            <td>{{ $schedule->patient->name }}</td>
                            <td>{{ $schedule->complaint }}</td>
                            <td>{{ $schedule->treatment }}</td>
                            <td class="text-center">{{ $schedule->schedule_date->format('d/m/Y') }}</td>
                            <td class="text-center">{{ $schedule->start_time->format('H:i') }} -
                                {{ $schedule->end_time->format('H:i') }} WIB</td>
                            <td class="text-center">{{ $schedule->practitioner->name }}</td>
                            <td class="text-center capitalize">{{ $schedule->status }}</td>
                            <td>
                                <a href="/jadwal-terapi/{{ $schedule->id }}"
                                    class="button bg-primary text-primary-foreground button--sm">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-ui.pagination :paginator="$schedules" :query="['search' => $search]" />
    </div>
</x-layout.dashboard>
