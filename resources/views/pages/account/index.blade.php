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
            <x-ui.alert.success />

            <form method="POST" action="/account" id="account-form">
                @csrf
                @method('PATCH')
                <div class="flex flex-col gap-6">
                    <div class="grid">
                        <div class="flex flex-col gap-1.5">
                            <label class="text-[18px] font-medium">Nama Admin</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="input">
                            @error('name')
                                <span class="input__message input__message--destructive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input">
                        @error('email')
                            <span class="input__message input__message--destructive">{{ $message }}</span>
                        @enderror
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
