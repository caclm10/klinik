<x-layout.dashboard>
    <x-ui.page-header title="Dokter/Perawat" search-placeholder="Cari nama dokter/perawat">
        <x-slot:actions>
            <button type="button" class="button bg-white border-[#C3D3E2]">
                <span>Filter</span>
            </button>

            <a href="/dokter-perawat/tambah" class="button bg-primary text-primary-foreground border-primary">
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

    <x-ui.empty-state title="Belum Ada Data" description="Tambah data dokter/perawat untuk menampilkan data"
        action-href="/dokter-perawat/tambah" action-label="Tambah Data" />

    <div>
        <div class="overflow-x-auto py-2">
            <table class="table table--rounded border-separate border-spacing-y-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>No Hp</th>
                        <th>Email</th>
                        <th>Nomor SIP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($staff as $member)
                        <tr class="bg-white even:bg-muted">
                            <td class="text-center">{{ $member->id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->birth_place }}</td>
                            <td>{{ $member->birth_date }}</td>
                            <td>{{ $member->gender }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->sip }}</td>
                            <td>
                                <span
                                    class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-medium {{ $member->status === 'Dokter' ? 'bg-primary/10 text-primary' : 'bg-info/10 text-info' }}">
                                    {{ $member->status }}
                                </span>
                            </td>
                            <td>
                                <a href="/dokter-perawat/{{ $member->id }}"
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

                <button type="button" class="button button--icon">1</button>
                <button type="button" class="button button--icon">2</button>
                <button type="button" class="button button--icon">3</button>
                <button type="button" class="button button--icon">...</button>
                <button type="button" class="button button--icon">10</button>

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
