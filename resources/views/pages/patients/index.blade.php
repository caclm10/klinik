<x-layout.dashboard>
    <x-ui.page-header title="Data Pasien" search-placeholder="Cari nama pasien">
        <x-slot:actions>
            <a href="/data-pasien/tambah" class="button bg-primary text-primary-foreground border-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>

                <span>Tambah Data</span>
            </a>
        </x-slot:actions>
    </x-ui.page-header>

    <x-ui.empty-state title="Belum Ada Data" description="Tambah data pasien untuk menampilkan data"
        action-href="/data-pasien/tambah" action-label="Tambah Data" />

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
                                <a href="/data-pasien/{{ $patient->id }}"
                                    class="button bg-primary text-primary-foreground button--sm">
                                    Detail
                                </a>
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
