<x-layout.dashboard>
    <div>
        <a href="/staff" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <h1 class="font-extrabold text-3xl">Tambah Data Dokter/Perawat</h1>

    <div class="flex justify-center">
        <div class="bg-white border border-foreground rounded-xl shadow-lg p-6 max-w-xl w-full">
            <div class="flex flex-col gap-6">
                <div class="grid">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan nama lengkap" class="input">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">Tempat Lahir</label>
                        <input type="text" placeholder="Contoh Medan" class="input">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">Tgl Lahir</label>
                        <input type="date" class="input">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="input">
                            <option value="" disabled selected>Pilih</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">Status (Dokter/ Perawat)</label>
                        <select name="status" id="status" class="input">
                            <option value="" disabled selected>Pilih</option>
                            <option value="Dokter">Dokter</option>
                            <option value="Perawat">Perawat</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">No. Hp</label>
                        <input type="text" placeholder="Contoh 08123456789" class="input">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">Email</label>
                        <input type="email" placeholder="Contoh genqi@gmail.com" class="input">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[18px] font-medium">Nomor SIP</label>
                    <input type="text" placeholder="Masukkan nomor SIP (Surat Izin Praktik)" class="input">
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit" class="button bg-primary text-primary-foreground border-primary">
                        Simpan
                    </button>

                    <a href="/staff" class="button">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout.dashboard>
