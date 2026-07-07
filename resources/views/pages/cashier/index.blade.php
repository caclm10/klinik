<x-layout.dashboard>
    <x-ui.page-header title="Kasir Bulanan" search-placeholder="Cari bulan/tahun" />

    <div class="flex flex-col gap-4">
        <x-ui.month-link :href="url('/kasir/02-2026')" month="Februari" year="2026" />
        <x-ui.month-link :href="url('/kasir/01-2026')" month="Januari" year="2026" />
        <x-ui.month-link :href="url('/kasir/12-2025')" month="Desember" year="2025" />
    </div>


</x-layout.dashboard>
