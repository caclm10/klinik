<x-layout.dashboard>

    <div class="flex items-center gap-3">
        <h1 class="font-extrabold text-3xl">Data Pasien</h1>


        <div class="grow"></div>

        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="absolute left-3 top-1/2 -translate-y-1/2 size-4 text-muted-foreground">
                <path d="m21 21-4.34-4.34" />
                <circle cx="11" cy="11" r="8" />
            </svg>
            <input type="search" placeholder="Cari nama pasien"
                class="pl-10 h-10 px-3 border border-border rounded-lg text-sm focus-within:outline-none focus-within:ring-1 focus-within:ring-primary focus-within:border-primary" />
        </div>

        <a href="/data-pasien/tambah"
            class="inline-flex items-center justify-center gap-2 rounded-lg font-medium bg-primary text-primary-foreground px-3 h-10 text-sm shadow">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="M5 12h14" />
                <path d="M12 5v14" />
            </svg>

            <span class="">Tambah Data</span>
        </a>
    </div>


    <div class="flex justify-center">
        <div class="flex flex-col gap-6 mt-8">
            <div class="text-center flex flex-col gap-2">
                <p class="font-semibold text-lg">Belum Ada Data</p>
                <p class="text-sm text-muted-foreground">Buat jadwal Terapi atau tambah data pasien untuk menampilkan
                    data</p>
            </div>

            <div class="flex justify-center">
                <a href="/data-pasien/tambah"
                    class="inline-flex items-center justify-center gap-2 rounded-lg font-medium bg-primary text-primary-foreground px-3 h-10 text-sm shadow ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-4">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>

                    <span class="">Tambah Data</span>
                </a>
            </div>

        </div>
    </div>

    <div>
        <div class="overflow-x-auto py-2">
            <table class="table table--rounded border-separate border-spacing-y-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pasien</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Hp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($patients as $patient)
                        <tr class="bg-white even:bg-muted">
                            <td class="text-center">{{ $patient->id }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->birth_place }}</td>
                            <td>{{ $patient->birth_date }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>
                                <button type="button" class="button bg-primary text-primary-foreground button--sm">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-between items-center">
            <p class="text-muted-foreground text-xs">
                1 - 10 dari 89 Data
            </p>

            <div class="flex items-center gap-2">
                <button type="button" class="button button--icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-4">
                        <path d="m15 18-6-6 6-6" />
                    </svg>
                </button>

                <button type="button" class="button button--icon">
                    1
                </button>

                <button type="button" class="button button--icon">
                    2
                </button>

                <button type="button" class="button button--icon">
                    3
                </button>

                <button type="button" class="button button--icon">
                    ...
                </button>

                <button type="button" class="button button--icon">
                    10
                </button>

                <button type="button" class="button button--icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-4">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</x-layout.dashboard>
