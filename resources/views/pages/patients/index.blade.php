<x-layout.dashboard>
    <x-ui.page-header title="Data Pasien" search-placeholder="Cari nama pasien" search-action="{{ url('/data-pasien') }}"
        search-value="{{ $search }}">
        <x-slot:actions>
            <a href="/data-pasien/tambah" class="button bg-primary text-primary-foreground border-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="size-4">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>

                <span>Tambah Data</span>
            </a>
        </x-slot:actions>
    </x-ui.page-header>

    <x-ui.alert.success />

    @if ($patients->isEmpty())
        <x-ui.empty-state title="Belum Ada Data" description="Tambah data pasien untuk menampilkan data"
            action-href="/data-pasien/tambah" action-label="Tambah Data" />
    @else
        <div class="flex flex-col gap-4">
            <div class="overflow-x-auto py-2">
                <table class="table table--rounded border-separate border-spacing-y-3">
                    <thead>
                        <tr>
                            <th>No</th>
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
                                <td class="text-center">{{ $patients->firstItem() + $loop->index }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->birth_place }}</td>
                                <td>{{ $patient->birth_date?->format('d/m/Y') }}</td>
                                <td>{{ $patient->gender_label }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->address }}</td>
                                <td>
                                    <a href="/data-pasien/{{ $patient->id }}"
                                        class="button button--primary button--sm">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <x-ui.pagination :paginator="$patients" :query="['search' => $search]" />
        </div>
    @endif
</x-layout.dashboard>
