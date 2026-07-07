<x-layout.dashboard>
    <div>
        <a href="/dokter-perawat" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <div class="flex items-center gap-3">
        <h1 class="font-extrabold text-3xl">Detail Dokter/Perawat</h1>
    </div>

    <div class="bg-card shadow rounded-2xl overflow-hidden">
        <div class="p-6 bg-foreground text-white">
            <h2 class="text-xl font-bold text-nowrap">Informasi Dokter/Perawat</h2>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Nama Lengkap</span>
                    <span>{{ $staff->name }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Tempat Lahir</span>
                    <span>{{ $staff->birth_place }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Tgl Lahir</span>
                    <span>{{ $staff->birth_date }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Jenis Kelamin</span>
                    <span>{{ $staff->gender }}</span>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">No Hp</span>
                    <span>{{ $staff->phone }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Email</span>
                    <span>{{ $staff->email }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Nomor SIP</span>
                    <span>{{ $staff->sip }}</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Status</span>
                    <span>{{ $staff->status }}</span>
                </div>
            </div>
        </div>
    </div>
</x-layout.dashboard>
