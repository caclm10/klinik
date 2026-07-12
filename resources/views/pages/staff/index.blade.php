<x-layout.dashboard>
    <x-ui.page-header title="Dokter/Perawat" search-placeholder="Cari nama dokter/perawat" :search-action="url('/staff')"
        :search-value="$search">
        <x-slot:actions>
            <a href="/staff/tambah" class="button bg-primary text-primary-foreground border-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>

                <span>Tambah Data</span>
            </a>
        </x-slot:actions>
    </x-ui.page-header>

    @empty($staff)
        <x-ui.empty-state title="Belum Ada Data" description="Tambah data dokter/perawat untuk menampilkan data"
            action-href="/staff/tambah" action-label="Tambah Data" />
    @endempty

    @isset($staff)
        <div class="flex flex-col gap-4">
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
                                <td class="text-center">{{ $staff->firstItem() + $loop->index }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->birth_place }}</td>
                                <td>{{ $member->birth_date }}</td>
                                <td>{{ $member->gender->label() }}</td>
                                <td>{{ $member->phone }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->sip }}</td>
                                <td>
                                    <span
                                        class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-medium capitalize {{ $member->isA('dokter') ? 'bg-primary/10 text-primary' : 'bg-info/10 text-info' }}">
                                        {{ $member->roles->first()->name }}
                                    </span>
                                </td>
                                <td>
                                    <a href="/staff/{{ $member->id }}"
                                        class="button bg-primary text-primary-foreground button--sm">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <x-ui.pagination :paginator="$staff" :query="['search' => $search]" />
        </div>
    @endisset

</x-layout.dashboard>
