<x-layout.dashboard>


    <div>
        <a href="{{ $prev }}" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <h1 class="font-extrabold text-3xl">Buat Jadwal Terapi</h1>

    <div class="flex justify-center">
        <div class="bg-white border border-foreground rounded-xl shadow-lg p-6 max-w-xl">

            <div class="flex flex-col gap-6">

                {{-- Row 1: ID + Nama Pasien --}}
                <div class="grid">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium ">Pasien</label>

                        <div class="flex items-center gap-2">
                            <input type="text" placeholder="Pilih pasien" class="input grow">
                            <div>
                                <button type="button" class="button bg-primary text-primary-foreground border-primary"
                                    command="show-modal" commandfor="dialog-pilih-pasien">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </div>

                </div>


                {{-- Row 4: Keluhan --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-[18px] font-medium ">Keluhan</label>
                    <input type="text" placeholder="Contoh Stroke" class="input">
                </div>

                {{-- Row 5: Treatment --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-[18px] font-medium ">Treatment</label>
                    <input type="text" placeholder="Contoh Terapi Stroke" class="input">
                </div>

                {{-- Row 6: Jadwal + Waktu --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium ">Jadwal</label>
                        <div class="flex items-center justify-between w-full h-10 px-3 border border-border rounded-md">
                            <span class="text-[14px] ">Hr/Bln/Thn</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M3 9h18M9 3v4m6-4v4" stroke="#737791" stroke-width="2"
                                    stroke-linecap="round" />
                                <rect x="3" y="5" width="18" height="16" rx="2" stroke="#737791"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium ">Waktu</label>
                        <input type="text" placeholder="Contoh 13.00 - 14.00 WIB" class="input">
                    </div>
                </div>

                {{-- Row 7: Dokter/Perawat + Status --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium ">Dokter/ Perawat</label>
                        <input type="text" placeholder="Contoh dr.Yoga" class="input">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium ">Status</label>
                        <input type="text" placeholder="Contoh Selesai" class="input">
                    </div>
                </div>

                {{-- Row 8: Buttons --}}
                <div class="flex flex-col gap-3">

                    <button type="submit" class="button bg-primary text-primary-foreground border-primary">
                        Simpan
                    </button>

                    <button type="button" class="button text-destructive border-destructive">
                        Hapus Data
                    </button>
                </div>

            </div>

        </div>
    </div>

    <dialog id="dialog-pilih-pasien" class="dialog">
        <div class="bg-white w-full max-w-2xl p-6 rounded-xl flex flex-col gap-4" data-slot="box">
            <div data-slot="header">
                <h3 class="text-lg font-semibold">Pilih Pasien</h3>
            </div>

            <div data-slot="content">
                <div class="flex justify-end pt-1 pr-1">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="absolute left-3 top-1/2 -translate-y-1/2 size-4 text-muted-foreground">
                            <path d="m21 21-4.34-4.34" />
                            <circle cx="11" cy="11" r="8" />
                        </svg>
                        <input type="search" placeholder="Cari nama pasien"
                            class="pl-10 h-10 px-3 border border-border rounded-lg text-sm focus-within:outline-none focus-within:ring-1 focus-within:ring-primary focus-within:border-primary" />
                    </div>
                </div>
                <div class="overflow-x-auto py-2">
                    <table class="table table--rounded">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pasien</th>
                                <th>Tgl Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr data-spacer>
                                <td colspan="99" class="h-3 p-0"></td>
                            </tr>

                            @foreach ($patients as $patient)
                                <tr class="bg-white even:bg-muted">
                                    <td class="text-center">{{ $patient->id }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->birth_date }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>
                                        <button type="button"
                                            class="button bg-primary text-primary-foreground button--sm"
                                            commandfor="dialog-pilih-pasien" command="close">
                                            Pilih
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="size-4">
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                        </button>

                        <span class="text-muted-foreground text-xs">1 of 10</span>

                        <button type="button" class="button button--icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="size-4">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div data-slot="footer" class="flex justify-end">
                <button type="button" commandfor="dialog-pilih-pasien" command="close"
                    class="button">Close</button>
            </div>
        </div>
    </dialog>

</x-layout.dashboard>
