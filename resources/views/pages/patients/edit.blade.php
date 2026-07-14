<x-layout.dashboard>
    <div>
        <a href="/data-pasien/{{ $patient->id }}" class="button border-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m15 18-6-6 6-6" />
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <h1 class="font-extrabold text-3xl">Edit Data Pasien</h1>

    <div class="flex justify-center">
        <div class="bg-white border border-foreground rounded-xl shadow-lg p-6 max-w-xl w-full">
            <form action="{{ route('patients.update', $patient) }}" method="POST" class="flex flex-col gap-6">
                @csrf
                @method('PATCH')

                <div class="grid">
                    <div class="flex flex-col gap-1.5">
                        <label for="name" class="text-[18px] font-medium">Nama Pasien</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $patient->name) }}"
                            placeholder="Contoh Joko" class="input">
                        @error('name')
                            <span class="input__message input__message--destructive">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label for="birth_place" class="text-[18px] font-medium">Tempat Lahir</label>
                        <input type="text" id="birth_place" name="birth_place"
                            value="{{ old('birth_place', $patient->birth_place) }}" placeholder="Contoh Medan"
                            class="input">
                        @error('birth_place')
                            <span class="input__message input__message--destructive">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="birth_date" class="text-[18px] font-medium">Tgl Lahir</label>
                        <input type="date" id="birth_date" name="birth_date"
                            value="{{ old('birth_date', $patient->birth_date?->format('Y-m-d')) }}" class="input">
                        @error('birth_date')
                            <span class="input__message input__message--destructive">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="gender" class="text-[18px] font-medium">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="input">
                            <option value="" disabled {{ old('gender', $patient->gender) ? '' : 'selected' }}>
                                Pilih
                            </option>
                            <option value="L" {{ old('gender', $patient->gender) === 'L' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="P" {{ old('gender', $patient->gender) === 'P' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        @error('gender')
                            <span class="input__message input__message--destructive">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="phone" class="text-[18px] font-medium">No. Hp</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $patient->phone) }}"
                        placeholder="Contoh 08123456789" class="input">
                    @error('phone')
                        <span class="input__message input__message--destructive">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="address" class="text-[18px] font-medium">Alamat</label>
                    <textarea id="address" name="address" rows="4" placeholder="Contoh Jl. Tuba II, Medan Denai"
                        class="input h-auto">{{ old('address', $patient->address) }}</textarea>
                    @error('address')
                        <span class="input__message input__message--destructive">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit" class="button bg-primary text-primary-foreground border-primary">
                        Simpan
                    </button>

                    <button type="submit" form="delete-form" class="button text-destructive border-destructive">
                        Hapus Data
                    </button>
                </div>
            </form>
            
            <form id="delete-form" action="{{ route('patients.destroy', $patient) }}" method="POST" class="hidden"
                data-alert="Apakah Anda yakin ingin menghapus data pasien ini? Data yang dihapus tidak dapat dikembalikan.">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-layout.dashboard>
