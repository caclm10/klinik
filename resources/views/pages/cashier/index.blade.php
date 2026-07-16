<x-layout.dashboard>
    <x-ui.page-header title="Kasir Bulanan" search-placeholder="Cari nama pasien" search-action="{{ url('/kasir') }}"
        search-value="{{ $search }}" />

    @if ($months->isEmpty())
        <div class="flex justify-center">
            <div class="flex flex-col gap-6 mt-8">
                <div class="text-center flex flex-col gap-2">
                    <p class="font-semibold text-lg">Belum Ada Jadwal Selesai</p>
                    <p class="text-sm text-muted-foreground">
                        Jadwal terapi dengan status selesai akan muncul di sini untuk pembayaran.
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col gap-4">
            @foreach ($months as $item)
                <a href="/kasir/{{ str_pad($item->month, 2, '0', STR_PAD_LEFT) }}-{{ $item->year }}"
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
