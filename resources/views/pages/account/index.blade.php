<x-layout.dashboard>
    <div>
        <a href="/dashboard" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <h1 class="font-extrabold text-3xl">Pengaturan</h1>

    <div class="flex justify-center">
        <div class="bg-white border border-foreground rounded-xl shadow-lg p-6 max-w-xl w-full">
            <div class="flex flex-col gap-6">
                <div class="grid">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">Nama Admin</label>
                        <input type="text" value="{{ $admin->name }}" class="input">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[18px] font-medium">Email</label>
                    <input type="email" value="{{ $admin->email }}" class="input">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[18px] font-medium">Ubah Password</label>
                    <input type="password" value="{{ $admin->password }}" class="input">
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit" class="button bg-primary text-primary-foreground border-primary">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout.dashboard>
