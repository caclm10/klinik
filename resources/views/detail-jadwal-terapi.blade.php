<x-layout.dashboard>

    <div>
        <a href="/jadwal-terapi/02-2026" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <h1 class="font-extrabold text-3xl">Detail Terapi</h1>

    <div class="bg-card shadow rounded-2xl overflow-hidden">
        <div class="p-6 bg-foreground text-white">
            <h2 class="text-xl font-bold text-nowrap">Informasi</h2>
        </div>

        <div class="p-6 grid grid-cols-2 gap-4">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Pasien</span>
                    <a href="/data-pasien/{{ $patient->id }}" class="" target="_blank">{{ $patient->name }}
                        (#{{ $patient->id }})</a>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Keluhan</span>
                    <span class="">{{ $patient->therapy->complaint }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Treatment</span>
                    <span class="">{{ $patient->therapy->treatment }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Jadwal</span>
                    <span class="">{{ $patient->therapy->schedule_date }}</span>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Waktu</span>
                    <span class="">{{ $patient->therapy->schedule_time }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Perawat/Dokter</span>
                    <span class="">{{ $patient->therapy->practitioner }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Status</span>
                    <span class="">{{ $patient->therapy->status }}</span>
                </div>
            </div>
        </div>


    </div>
</x-layout.dashboard>
