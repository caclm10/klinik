<x-layout.dashboard>

    <div>
        <a href="/jadwal-terapi/02-2026" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <h1 class="font-extrabold text-3xl">Detail Transaksi</h1>

    <div class="bg-card shadow rounded-2xl overflow-hidden">
        <div class="p-6 bg-foreground text-white">
            <h2 class="text-xl font-bold text-nowrap">Informasi Pasien</h2>
        </div>

        <div class="p-6 grid grid-cols-2 gap-4">
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Pasien</span>
                    <a href="/data-pasien/{{ $patient->id }}" class="inline-flex gap-2 items-center" target="_blank">
                        <span>{{ $patient->name }} (#{{ $patient->id }})</span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="size-2.5">
                            <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                            <path d="m21 3-9 9" />
                            <path d="M15 3h6v6" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <span class="font-semibold">Treatment</span>
                    <a href="/jadwal-terapi/{{ $patient->therapy->id }}" class="inline-flex gap-2 items-center"
                        target="_blank">
                        <span>
                            {{ $patient->therapy->treatment }}
                        </span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="size-2.5">
                            <path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6" />
                            <path d="m21 3-9 9" />
                            <path d="M15 3h6v6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-card shadow rounded-2xl overflow-hidden">
        <div class="p-6 bg-primary text-primary-foreground">
            <h2 class="text-xl font-bold text-nowrap">Pembayaran</h2>
        </div>

        <div class="p-6">
            <form method="POST" action="/kasir/{{ $patient->id }}/bayar" class="grid grid-cols-1 gap-6"
                data-payment-form>
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="payment_method" class="font-semibold">Metode Pembayaran</label>
                        <input id="payment_method" name="payment_method" type="text"
                            placeholder="Contoh: Tunai, Transfer, QRIS"
                            class="h-10 px-3 border border-border rounded-lg text-sm focus-within:outline-none focus-within:ring-1 focus-within:ring-primary focus-within:border-primary" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="amount" class="font-semibold">Nominal</label>
                        <input id="amount" name="amount" type="text" inputmode="numeric" pattern="[0-9]*"
                            autocomplete="off" placeholder="Contoh: 150000" data-payment-amount
                            class="h-10 px-3 border border-border rounded-lg text-sm focus-within:outline-none focus-within:ring-1 focus-within:ring-primary focus-within:border-primary" />
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="paid_by" class="font-semibold">Dibayar Oleh</label>
                        <input id="paid_by" name="paid_by" type="text" placeholder="Nama pembayar"
                            class="h-10 px-3 border border-border rounded-lg text-sm focus-within:outline-none focus-within:ring-1 focus-within:ring-primary focus-within:border-primary" />
                    </div>

                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="note" class="font-semibold">Catatan</label>
                        <textarea id="note" name="note" rows="4" placeholder="Tulis catatan tambahan bila ada"
                            class="px-3 py-2 border border-border rounded-lg text-sm focus-within:outline-none focus-within:ring-1 focus-within:ring-primary focus-within:border-primary"></textarea>
                    </div>
                </div>

                <div class="rounded-2xl border border-border bg-muted/40 p-4 md:p-5">
                    <div class="flex items-center gap-4">
                        <div class="flex flex-col gap-1">
                            <span class="text-sm font-medium text-muted-foreground">Total Harga:</span>
                        </div>

                        <output class="text-lg font-bold tracking-tight md:text-xl" data-payment-total
                            aria-live="polite">
                            Rp0
                        </output>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="button bg-info text-info-foreground border-info">
                        Bayar Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout.dashboard>
