<x-layout.dashboard>

    <div>
        <a href="/data-pasien" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <h1 class="font-extrabold text-3xl">Tambah Data Pasien</h1>

    <div class="flex justify-center">
        <div class="bg-white border border-foreground rounded-xl shadow-lg p-6 max-w-xl">

            <div class="flex flex-col gap-6">

                {{-- Row 1: ID + Nama Pasien --}}
                <div class="grid">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium ">Nama Pasien</label>
                        <input type="text" placeholder="Contoh Joko" class="input">
                    </div>
                </div>

                {{-- Row 2: Tempat Lahir + Tgl Lahir + Jenis Kelamin --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium ">Tempat Lahir</label>
                        <input type="text" placeholder="Contoh Medan" class="input">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium ">Tgl Lahir</label>
                        <input type="date" placeholder="Cth. 01/01/2000" class="input">
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium ">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="input">
                            <option value="" disabled selected>Pilih</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[18px] font-medium ">No. Hp</label>
                    <input type="text" placeholder="Contoh 08123456789" class="input">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[18px] font-medium ">Alamat</label>
                    <input type="text" placeholder="Contoh Jl. Tuba II, Medan Denai" class="input">
                </div>



                {{-- Row 8: Buttons --}}
                <div class="flex flex-col gap-3">

                    <button type="submit" class="button bg-primary text-primary-foreground border-primary">
                        Simpan
                    </button>

                    <button type="button" class="button">
                        Batal
                    </button>
                </div>

            </div>

        </div>
    </div>



</x-layout.dashboard>
