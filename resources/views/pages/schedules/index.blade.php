<x-layout.dashboard>
    <div class="flex items-center gap-3">
        <h1 class="font-extrabold text-3xl">Jadwal Bulanan</h1>


        <div class="grow"></div>

        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="absolute left-3 top-1/2 -translate-y-1/2 size-4 text-muted-foreground">
                <path d="m21 21-4.34-4.34" />
                <circle cx="11" cy="11" r="8" />
            </svg>
            <input type="search" placeholder="Cari bulan/tahun"
                class="pl-10 h-10 px-3 border border-border rounded-lg text-sm focus-within:outline-none focus-within:ring-1 focus-within:ring-primary focus-within:border-primary" />
        </div>

        <a href="/jadwal-terapi/buat"
            class="inline-flex items-center justify-center gap-2 rounded-lg font-medium bg-primary text-primary-foreground px-3 h-10 text-sm shadow">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="M5 12h14" />
                <path d="M12 5v14" />
            </svg>

            <span class="">Buat Jadwal</span>
        </a>
    </div>

    <div class="flex justify-center">
        <div class="flex flex-col gap-6 mt-8">
            <div class="text-center flex flex-col gap-2">
                <p class="font-semibold text-lg">Belum Ada Jadwal</p>
                <p class="text-sm text-muted-foreground">
                    Buat jadwal terapi untuk menampilkan jadwal berdasarkan bulan dan tahun
                </p>
            </div>

            <div class="flex justify-center">
                <a href="/jadwal-terapi/buat"
                    class="inline-flex items-center justify-center gap-2 rounded-lg font-medium bg-primary text-primary-foreground px-3 h-10 text-sm shadow ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-4">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>

                    <span class="">Buat Jadwal</span>
                </a>
            </div>

        </div>
    </div>

    <div class="flex flex-col gap-4">
        <a href="/jadwal-terapi/02-2026" class="button bg-white justify-start gap-1">
            <span class="">Februari</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m9 18 6-6-6-6" />
            </svg>

            <span class="grow"></span>

            <span class="text-primary">2026</span>
        </a>

        <a href="/jadwal-terapi/01-2026" class="button bg-white justify-start gap-1">
            <span class="">Januari</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m9 18 6-6-6-6" />
            </svg>

            <span class="grow"></span>

            <span class="text-primary">2026</span>
        </a>

        <a href="/jadwal-terapi/12-2025" class="button bg-white justify-start gap-1">
            <span class="">Desember</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m9 18 6-6-6-6" />
            </svg>

            <span class="grow"></span>

            <span class="text-primary">2025</span>
        </a>
    </div>




</x-layout.dashboard>
