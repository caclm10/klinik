<x-layout.dashboard>

    <div>
        <a href="/jadwal-terapi/{{ $schedule->schedule_date->format('m-Y') }}" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <div class="flex items-center gap-3">
        <h1 class="font-extrabold text-3xl">Detail Terapi</h1>

        <div class="grow"></div>

        @can('view-dashboard')
            <a href="/jadwal-terapi/{{ $schedule->id }}/edit"
                class="button bg-warning text-warning-foreground border-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                    <path
                        d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                </svg>
                <span>Edit Jadwal</span>
            </a>
        @endcan
    </div>

    <div class="bg-card shadow rounded-2xl overflow-hidden">
        <div class="p-6 bg-foreground text-white">
            <h2 class="text-xl font-bold text-nowrap">Informasi</h2>
        </div>

        <div class="p-6 grid grid-cols-2 gap-4">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Pasien</span>
                    <a href="/data-pasien/{{ $schedule->patient_id }}" target="_blank">
                        {{ $schedule->patient->name }} (#{{ $schedule->patient_id }})
                    </a>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Keluhan</span>
                    <span>{{ $schedule->complaint }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Treatment</span>
                    <span>{{ $schedule->treatment }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Jadwal</span>
                    <span>{{ $schedule->schedule_date->format('d/m/Y') }}</span>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Waktu</span>
                    <span>{{ $schedule->start_time->format('H:i') }} - {{ $schedule->end_time->format('H:i') }} WIB</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Perawat/Dokter</span>
                    <span>{{ $schedule->practitioner->name }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Status</span>
                    <span class="capitalize">{{ $schedule->status }}</span>
                </div>
            </div>
        </div>
    </div>
</x-layout.dashboard>
