<x-layout.dashboard>
    @php
        $therapy = $patient->schedules->sortByDesc('schedule_date')->first();
    @endphp

    <div>
        <a href="/data-pasien" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <x-ui.alert.success />

    <div class="flex items-center gap-3">
        <h1 class="font-extrabold text-3xl">Detail Pasien</h1>

        <div class="grow"></div>

        <a href="/data-pasien/{{ $patient->id }}/edit"
            class="button bg-warning text-warning-foreground border-warning">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                <path
                    d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
            </svg>
            <span>
                Edit Data Pasien
            </span>
        </a>

        <button type="button" class="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="M12 15V3" />
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <path d="m7 10 5 5 5-5" />
            </svg>

            <span>
                Unduh
            </span>
        </button>
    </div>

    <div class="bg-card shadow rounded-2xl overflow-hidden">
        <div class="p-6 bg-foreground text-white">
            <h2 class="text-xl font-bold text-nowrap">Biodata Pasien</h2>
        </div>

        <div class="p-6 grid grid-cols-2 gap-4">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">ID Pasien</span>
                    <span class="text-2xl">#{{ $patient->id }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Nama Lengkap</span>
                    <span class="">{{ $patient->name }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Tempat, Tanggal Lahir</span>
                    <span class="">{{ $patient->birth_place }}, {{ $patient->birth_date?->format('d/m/Y') }}</span>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Jenis Kelamin</span>
                    <span class="">{{ $patient->gender_label }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Nomor HP</span>
                    <span class="">{{ $patient->phone }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Alamat</span>
                    <span class="">{{ $patient->address }}</span>
                </div>
            </div>
        </div>
    </div>

    @if ($therapy)
        <div class="bg-card shadow rounded-2xl overflow-hidden">
            <div class="p-6 bg-foreground text-white">
                <h2 class="text-xl font-bold text-nowrap">Terapi Terakhir</h2>
            </div>

            <div class="p-6 grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-6">
                    <div class="flex flex-col gap-1">
                        <span class="font-semibold">Keluhan</span>
                        <span class="">{{ $therapy->complaint }}</span>
                    </div>

                    <div class="flex flex-col gap-1">
                        <span class="font-semibold">Treatment</span>
                        <span class="">{{ $therapy->treatment }}</span>
                    </div>

                    <div class="flex flex-col gap-1">
                        <span class="font-semibold">Jadwal</span>
                        <span class="">{{ $therapy->schedule_date?->format('d/m/Y') }}</span>
                    </div>
                </div>

                <div class="flex flex-col gap-6">
                    <div class="flex flex-col gap-1">
                        <span class="font-semibold">Waktu</span>
                        <span class="">{{ $therapy->start_time?->format('H:i') }} - {{ $therapy->end_time?->format('H:i') }} WIB</span>
                    </div>

                    <div class="flex flex-col gap-1">
                        <span class="font-semibold">Perawat/Dokter</span>
                        <span class="">{{ $therapy->practitioner?->name }}</span>
                    </div>

                    <div class="flex flex-col gap-1">
                        <span class="font-semibold">Status</span>
                        <span class="">{{ $therapy->status }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-layout.dashboard>
