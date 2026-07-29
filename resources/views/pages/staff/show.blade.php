<x-layout.dashboard>
    <div>
        <a href="/staff" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <div class="flex items-center gap-3">
        <h1 class="font-extrabold text-3xl">Detail Dokter/Perawat</h1>

        <div class="grow"></div>

        <a href="/staff/{{ $staff->id }}/edit" class="button bg-warning text-warning-foreground border-warning">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                <path
                    d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
            </svg>
            <span>
                Edit Data Dokter/Perawat
            </span>
        </a>

        <a href="{{ route('staff.download', $staff) }}" class="button">
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
    </div>

    <x-ui.alert.success />

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
                    <span>{{ $staff->gender->label() }}</span>
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
                    <span class="capitalize">{{ $staff->role }}</span>
                </div>
            </div>
        </div>
    </div>
</x-layout.dashboard>
