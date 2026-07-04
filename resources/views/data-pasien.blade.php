<x-layout.dashboard>

    <div class="flex items-center gap-3">
        <h1 class="font-extrabold text-3xl">Data Pasien</h1>


        <div class="grow"></div>

        <input type="search" placeholder="Cari nama pasien"
            class="h-10 px-3 border border-border rounded-lg text-sm focus-within:outline-none focus-within:ring-1 focus-within:ring-primary focus-within:border-primary" />

        <button type="button"
            class="inline-flex items-center justify-center gap-2 rounded-lg font-medium bg-primary text-primary-foreground px-3 h-10 text-sm shadow ">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="M5 12h14" />
                <path d="M12 5v14" />
            </svg>

            <span class="">Tambah Data</span>
        </button>
    </div>


    <div class="flex justify-center">
        <div class="flex flex-col gap-6 mt-8">
            <div class="text-center flex flex-col gap-2">
                <p class="font-semibold text-lg">Belum Ada Data</p>
                <p class="text-sm text-muted-foreground">Buat jadwal Terapi atau tambah data pasien untuk menampilkan
                    data</p>
            </div>

            <div class="flex justify-center">
                <button type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-lg font-medium bg-primary text-primary-foreground px-3 py-2 text-sm shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-4">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>

                    <span class="">Tambah Data</span>
                </button>
            </div>

        </div>
    </div>
</x-layout.dashboard>
