<x-layout.dashboard>
    <x-ui.page-header title="Jadwal Bulanan" search-placeholder="Cari bulan/tahun"
        search-action="{{ url('/jadwal-terapi') }}" search-value="{{ $search }}">
        <x-slot:actions>
            <a href="/jadwal-terapi/buat"
                class="inline-flex items-center justify-center gap-2 rounded-lg font-medium bg-primary text-primary-foreground px-3 h-10 text-sm shadow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="size-4">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>

                <span class="">Buat Jadwal</span>
            </a>
        </x-slot:actions>
    </x-ui.page-header>

    @if ($months->isEmpty())
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
    @else
        <div class="flex flex-col gap-4">
            @foreach ($months as $item)
                <a href="/jadwal-terapi/{{ str_pad($item->month, 2, '0', STR_PAD_LEFT) }}-{{ $item->year }}"
                    class="button bg-white justify-start gap-1">
                    <span>{{ $item->month_name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-4">
                        <path d="m9 18 6-6-6-6" />
                    </svg>

                    <span class="grow"></span>

                    <span class="text-primary">{{ $item->year }}</span>
                </a>
            @endforeach
        </div>
    @endif
</x-layout.dashboard>
