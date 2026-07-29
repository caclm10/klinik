<x-layout.dashboard>
    <div>
        <a href="/kasir" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <x-ui.page-header title="Kasir {{ $monthName }} {{ $year }}" search-placeholder="Cari nama pasien"
        search-action="{{ url('/kasir/'.$month.'-'.$year) }}" search-value="{{ $search }}">
        <x-slot:actions>
            <a href="{{ route('cashier.download', ['month' => $month, 'year' => $year]) }}" class="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                    <path d="M12 15V3" />
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                    <path d="m7 10 5 5 5-5" />
                </svg>

                <span>
                    Unduh
                </span>
            </a>
        </x-slot:actions>
    </x-ui.page-header>

    <x-ui.alert.success />

    @if ($schedules->isEmpty())
        <x-ui.empty-state title="Belum Ada Data" description="Tidak ada jadwal terapi pada bulan ini." />
    @else
        <div class="flex flex-col gap-4">
            <div class="overflow-x-auto py-2">
                <table class="table table--rounded border-separate border-spacing-y-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Nama Pasien</th>
                            <th>Treatment</th>
                            <th>Perawat/Dokter</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($schedules as $schedule)
                            <tr class="bg-white even:bg-muted">
                                <td class="text-center">{{ $schedules->firstItem() + $loop->index }}</td>
                                <td class="text-center">{{ $schedule->schedule_date->format('d/m/Y') }}</td>
                                <td class="text-center">{{ $schedule->start_time->format('H:i') }} - {{ $schedule->end_time->format('H:i') }}</td>
                                <td>{{ $schedule->patient->name }}</td>
                                <td>{{ $schedule->treatment }}</td>
                                <td class="text-center">{{ $schedule->practitioner->name }}</td>
                                <td>
                                    <a href="/kasir/{{ $schedule->id }}"
                                        class="button button--sm {{ $schedule->transaction ? 'bg-success text-success-foreground border-success' : 'bg-info text-info-foreground border-info' }}">
                                        {{ $schedule->transaction ? 'Lunas' : 'Bayar' }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <x-ui.pagination :paginator="$schedules" :query="['search' => $search]" />
        </div>
    @endif
</x-layout.dashboard>
