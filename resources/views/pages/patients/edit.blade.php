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

    <form action="#" method="POST" class="flex flex-col gap-6">
        @csrf

        <div class="flex justify-center">
            <div class="bg-white border border-foreground rounded-xl shadow-lg p-6 max-w-xl w-full">
                <div class="flex flex-col gap-6">
                    <div class="grid">
                        <div class="flex flex-col gap-1.5">
                            <label class="text-[18px] font-medium">ID Pasien</label>
                            <input type="text" value="{{ $patient->id }}" readonly class="input bg-muted/40">
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="name" class="text-[18px] font-medium">Nama Pasien</label>
                        <input id="name" name="name" type="text" value="{{ $patient->name }}" class="input">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="birth_place" class="text-[18px] font-medium">Tempat Lahir</label>
                        <input id="birth_place" name="birth_place" type="text" value="{{ $patient->birth_place }}"
                            class="input">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="birth_date" class="text-[18px] font-medium">Tgl Lahir</label>
                        <input id="birth_date" name="birth_date" type="text" value="{{ $patient->birth_date }}"
                            class="input">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-1.5">
                            <label for="gender" class="text-[18px] font-medium">Jenis Kelamin</label>
                            <input id="gender" name="gender" type="text" value="{{ $patient->gender }}"
                                class="input">
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <label for="phone" class="text-[18px] font-medium">No. Hp</label>
                            <input id="phone" name="phone" type="text" value="{{ $patient->phone }}"
                                class="input">
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="address" class="text-[18px] font-medium">Alamat</label>
                        <textarea id="address" name="address" rows="4" class="input h-auto">{{ $patient->address }}</textarea>
                    </div>

                    <div class="grid">
                        <div class="flex flex-col gap-1.5">
                            <label for="complaint" class="text-[18px] font-medium">Keluhan</label>
                            <input id="complaint" name="complaint" type="text"
                                value="{{ $patient->therapy->complaint }}" class="input">
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="treatment" class="text-[18px] font-medium">Treatment</label>
                        <input id="treatment" name="treatment" type="text" value="{{ $patient->therapy->treatment }}"
                            class="input">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-1.5">
                            <label for="schedule_date" class="text-[18px] font-medium">Jadwal</label>
                            <div
                                class="flex items-center justify-between w-full h-10 px-3 border border-border rounded-md">
                                <input id="schedule_date" name="schedule_date" type="text"
                                    value="{{ $patient->therapy->schedule_date }}"
                                    class="w-full bg-transparent outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path d="M3 9h18M9 3v4m6-4v4" stroke="#737791" stroke-width="2"
                                        stroke-linecap="round" />
                                    <rect x="3" y="5" width="18" height="16" rx="2" stroke="#737791"
                                        stroke-width="2" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <label for="schedule_time" class="text-[18px] font-medium">Waktu</label>
                            <input id="schedule_time" name="schedule_time" type="text"
                                value="{{ $patient->therapy->schedule_time }}" class="input">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-1.5">
                            <label for="practitioner" class="text-[18px] font-medium">Dokter/ Perawat</label>
                            <input id="practitioner" name="practitioner" type="text"
                                value="{{ $patient->therapy->practitioner }}" class="input">
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <label for="status" class="text-[18px] font-medium">Status</label>
                            <input id="status" name="status" type="text"
                                value="{{ $patient->therapy->status }}" class="input">
                        </div>
                    </div>

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
    </form>
</x-layout.dashboard>
