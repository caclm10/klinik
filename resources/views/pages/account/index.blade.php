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
        <div class="card w-full max-w-lg flex flex-col gap-6">
            @session('success')
                <div class="alert alert--success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="">
                        <path
                            d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                    <p class="alert__title">Berhasil</p>
                    <p class="alert__description">Akun berhasil diperbarui.</p>
                </div>
            @endsession

            <form method="POST" action="/account" id="account-form">
                @csrf
                @method('PATCH')
                <div class="flex flex-col gap-6">
                    <div class="grid">
                        <div class="flex flex-col gap-1.5">
                            <label class="text-[18px] font-medium">Nama Admin</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="input">
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input">
                    </div>

                    {{-- <div class="flex flex-col gap-1.5">
                    <label class="text-[18px] font-medium">Ubah Password</label>
                    <input type="password" class="input">
                </div> --}}
                </div>
            </form>

            <div class="flex justify-end">
                <button type="submit" form="account-form" class="button button--primary">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</x-layout.dashboard>
