<x-layout.dashboard>


    <h1 class="font-extrabold text-3xl">Selamat Datang!</h1>

    <div class="flex gap-4">
        <div class="bg-card p-6 shadow rounded-2xl flex flex-col gap-8">
            <div class="flex items-center justify-between">
                <div class="flex flex-col gap-1">
                    <h2 class="font-semibold">Laporan Bulanan</h2>
                    <p class="text-muted-foreground text-sm">Februari 2026</p>
                </div>

                <button type="button"
                    class="inline-flex items-center gap-2 text-sm px-3 py-2 border border-[#C3D3E2] rounded-lg font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-3">
                        <path d="M12 15V3" />
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                        <path d="m7 10 5 5 5-5" />
                    </svg>

                    <span>Unduh</span>
                </button>
            </div>

            <div class="flex gap-4">
                <div class="bg-muted p-5 flex flex-col gap-4 rounded-2xl">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="size-10">
                            <path d="M17.925 20.056a6 6 0 0 0-11.851.001" />
                            <circle cx="12" cy="11" r="4" />
                            <circle cx="12" cy="12" r="10" />
                        </svg>
                    </div>

                    <div class="flex flex-col gap-1">
                        <p class="font-bold text-2xl">99</p>

                        <p class="text-sm">Total Pasien</p>

                        <p class="text-xs">+2,5% dari tahun lalu</p>
                    </div>
                </div>

                <div class="bg-foreground text-white p-5 flex flex-col gap-4 rounded-2xl">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="size-10">
                            <path d="M13.744 17.736a6 6 0 1 1-7.48-7.48" />
                            <path d="M15 6h1v4" />
                            <path d="m6.134 14.768.866-.5 2 3.464" />
                            <circle cx="16" cy="8" r="6" />
                        </svg>
                    </div>

                    <div class="flex flex-col gap-1">
                        <p class="inline-flex items-end font-bold">
                            <span class="text-xs leading-6">Rp</span>
                            <span class="text-2xl ">10.000.000</span>
                        </p>

                        <p class="text-sm">Total Pendapatan</p>

                        <p class="text-xs">+2% dari tahun lalu</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-card p-6 shadow rounded-2xl flex flex-col gap-8 grow">
            <div class="flex items-center justify-between">
                <div class="flex flex-col gap-1">
                    <h2 class="font-semibold">Data Kunjungan Pasien</h2>
                </div>

                <p class="text-sm text-muted-foreground">2026</p>
            </div>


        </div>


    </div>

    <div class="grid grid-cols-[minmax(0,1fr)_330px] items-start gap-4">
        <div class="bg-card shadow rounded-2xl flex flex-col gap-8">

            <div class="flex items-center justify-between p-6">
                <div class="flex flex-col gap-1">
                    <h2 class="font-semibold">Jadwal Terapi</h2>
                    <p class="text-muted-foreground text-sm">Februari 2026</p>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-sm text-muted-foreground">1 - 5 dari 94 Data</span>

                    <button type="button"
                        class="inline-flex items-center gap-2 text-sm px-3 py-2 border border-[#C3D3E2] rounded-lg font-medium">
                        <span>Selengkapnya</span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="size-3">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto pb-6">
                <table class="table table--sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Keluhan</th>
                            <th>Treatment</th>
                            <th>Jadwal</th>
                            <th>Waktu</th>
                            <th>Perawat/Dokter</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-nowrap">Joko Saputra</td>
                            <td class="text-center text-nowrap">Stroke</td>
                            <td class="text-center text-nowrap">Terapi Stroke</td>
                            <td class="text-center text-nowrap">15/02/2026</td>
                            <td class="text-center text-nowrap">15.00 - 16.00 WIB</td>
                            <td class="text-center text-nowrap">dr. Yoga Dar..</td>
                            <td class="text-center text-nowrap">Menunggu</td>
                        </tr>

                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-nowrap">Anwar Maulana</td>
                            <td class="text-center text-nowrap">Sakit Punggung</td>
                            <td class="text-center text-nowrap">Terapi Full Body</td>
                            <td class="text-center text-nowrap">15/02/2026</td>
                            <td class="text-center text-nowrap">10.00 - 11.00 WIB</td>
                            <td class="text-center text-nowrap">Usman Mudly..</td>
                            <td class="text-center text-nowrap">Selesai</td>
                        </tr>

                        <tr>
                            <td class="text-center">3</td>
                            <td class="text-nowrap">Suwarni</td>
                            <td class="text-center text-nowrap">Tangan Kebas</td>
                            <td class="text-center text-nowrap">Terapi full body</td>
                            <td class="text-center text-nowrap">14/02/2026</td>
                            <td class="text-center text-nowrap">15.00 - 16.00 WIB</td>
                            <td class="text-center text-nowrap">Sabila Nuru..</td>
                            <td class="text-center text-nowrap">Selesai</td>
                        </tr>

                        <tr>
                            <td class="text-center">4</td>
                            <td class="text-nowrap">Teguh Baskara</td>
                            <td class="text-center text-nowrap">Sesak Nafas</td>
                            <td class="text-center text-nowrap">Hydrogen Inha..</td>
                            <td class="text-center text-nowrap">08/02/2026</td>
                            <td class="text-center text-nowrap">15.00 - 16.00 WIB</td>
                            <td class="text-center text-nowrap">Usman Mudiy..</td>
                            <td class="text-center text-nowrap">Selesai</td>
                        </tr>

                        <tr>
                            <td class="text-center">5</td>
                            <td class="text-nowrap">Sawiyah</td>
                            <td class="text-center text-nowrap">Kaki Kebas</td>
                            <td class="text-center text-nowrap">Terapi full body</td>
                            <td class="text-center text-nowrap">06/02/2026</td>
                            <td class="text-center text-nowrap">15.00 - 16.00 WIB</td>
                            <td class="text-center text-nowrap">dr. Indri cah..</td>
                            <td class="text-center text-nowrap">Selesai</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-card shadow rounded-2xl overflow-hidden">
            <div class="p-6 bg-foreground text-white">
                <h2 class="text-xl font-bold text-nowrap">Daftar Dokter dan Perawat</h2>
            </div>

            <div class="p-6 ">
                <ul class="flex flex-col gap-4 text-sm font-semibold">
                    <li class="grid grid-cols-[minmax(0,1fr)_65px] gap-4">
                        <p data-slot="daftar-dokter-perawat">dr. Indri Cahyani</p>
                        <p class="text-center data-[role=dokter]:text-primary" data-role="dokter">
                            Dokter
                        </p>
                    </li>

                    <li class="grid grid-cols-[minmax(0,1fr)_65px] gap-4">
                        <p data-slot="daftar-dokter-perawat">Sabila Nurul Putri</p>
                        <p class="text-center data-[role=dokter]:text-primary" data-role="perawat">
                            Perawat
                        </p>
                    </li>

                    <li class="grid grid-cols-[minmax(0,1fr)_65px] gap-4">
                        <p data-slot="daftar-dokter-perawat">Usman Mudiyo</p>
                        <p class="text-center data-[role=dokter]:text-primary" data-role="perawat">
                            Perawat
                        </p>
                    </li>

                    <li class="grid grid-cols-[minmax(0,1fr)_65px] gap-4">
                        <p data-slot="daftar-dokter-perawat">dr. Yoga Darmawan</p>
                        <p class="text-center data-[role=dokter]:text-primary" data-role="dokter">
                            Dokter
                        </p>
                    </li>
                </ul>
            </div>


        </div>
    </div>

</x-layout.dashboard>
