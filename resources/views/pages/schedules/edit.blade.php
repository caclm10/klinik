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

    <h1 class="font-extrabold text-3xl">Edit Jadwal Terapi</h1>

    <div class="flex justify-center">
        <div class="bg-white border border-foreground rounded-xl shadow-lg p-6 max-w-xl w-full">
            <form action="{{ route('schedules.update', $schedule) }}" method="POST" class="flex flex-col gap-6"
                x-data="{ disabled: false }" x-on:open:entity-picker="disabled = true"
                x-on:close:entity-picker="disabled = false">
                @csrf
                @method('PATCH')

                <div class="grid">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[18px] font-medium">Pasien</label>

                        <div class="flex items-center gap-2" x-data="entityPicker('data-pasien')" x-init="selectedItemId = '{{ old('patient_id', $schedule->patient_id) }}';
                        selectedItemName = '{{ old('patient_name', $schedule->patient->name) }}'">
                            <input type="hidden" name="patient_id" x-model="selectedItemId">
                            <input type="text" x-model="selectedItemName" placeholder="Pilih pasien" readonly
                                class="input grow">

                            <div>
                                <button type="button" class="button button--primary-outline" @click="open()">
                                    Cari
                                </button>
                            </div>

                            <dialog x-ref="dialog" class="dialog">
                                <div class="bg-white w-full max-w-2xl p-6 rounded-xl flex flex-col gap-4"
                                    data-slot="box">
                                    <div class="dialog__header">
                                        <h3 class="text-lg font-semibold">Pilih Pasien</h3>
                                    </div>

                                    <div class="dialog__content">
                                        <div class="flex justify-end pt-1 pr-1">
                                            <div class="relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="absolute left-3 top-1/2 -translate-y-1/2 size-4 text-muted-foreground">
                                                    <path d="m21 21-4.34-4.34" />
                                                    <circle cx="11" cy="11" r="8" />
                                                </svg>
                                                <input type="search" placeholder="Cari nama pasien"
                                                    class="pl-10 h-10 px-3 border border-border rounded-lg text-sm focus-within:outline-none focus-within:ring-1 focus-within:ring-primary focus-within:border-primary"
                                                    x-on:input.debounce="search($event.target.value)" />
                                            </div>
                                        </div>
                                        <div class="overflow-x-auto py-2">
                                            <table class="table table--rounded">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
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

                                                    <template x-for="(items, index) in paginator.data"
                                                        :key="items.id">
                                                        <tr class="bg-white even:bg-muted">
                                                            <td class="text-center"
                                                                x-text="paginator.meta.from + index">
                                                            </td>
                                                            <td x-text="items.name"></td>
                                                            <td x-text="items.birthDate"></td>
                                                            <td x-text="items.gender"></td>
                                                            <td>
                                                                <button type="button"
                                                                    class="button bg-primary button--primary button--sm"
                                                                    @click="selectItem(items)">
                                                                    Pilih
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <p class="text-muted-foreground text-xs" x-text="paginationInfo">

                                            </p>

                                            <div class="flex items-center gap-2">
                                                <button type="button" class="button button--icon"
                                                    :disabled="paginator.meta.current_page === 1"
                                                    @click="goToPage(paginator.meta.current_page - 1)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="size-4">
                                                        <path d="m15 18-6-6 6-6" />
                                                    </svg>
                                                </button>

                                                <span class="text-muted-foreground text-xs"
                                                    x-text="`${paginator.meta.current_page} of ${paginator.meta.last_page}`"></span>

                                                <button type="button" class="button button--icon"
                                                    :disabled="paginator.meta.current_page === paginator.meta.last_page"
                                                    @click="goToPage(paginator.meta.current_page + 1)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="size-4">
                                                        <path d="m9 18 6-6-6-6" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dialog__footer justify-end">
                                        <button type="button" class="button" @click="close()">Close</button>
                                    </div>
                                </div>
                            </dialog>

                            @error('patient_id')
                                <span class="input__message input__message--destructive">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="flex flex-col gap-1.5">
                    <label for="complaint" class="text-[18px] font-medium">Keluhan</label>
                    <input type="text" id="complaint" name="complaint"
                        value="{{ old('complaint', $schedule->complaint) }}" placeholder="Contoh Stroke"
                        class="input">
                    @error('complaint')
                        <span class="input__message input__message--destructive">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="treatment" class="text-[18px] font-medium">Treatment</label>
                    <input type="text" id="treatment" name="treatment"
                        value="{{ old('treatment', $schedule->treatment) }}" placeholder="Contoh Terapi Stroke"
                        class="input">
                    @error('treatment')
                        <span class="input__message input__message--destructive">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex flex-col gap-1.5">
                        <label for="schedule_date" class="text-[18px] font-medium">Jadwal</label>
                        <input type="date" id="schedule_date" name="schedule_date"
                            value="{{ old('schedule_date', $schedule->schedule_date->format('Y-m-d')) }}"
                            class="input">
                        @error('schedule_date')
                            <span class="input__message input__message--destructive">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label for="start_time" class="text-[18px] font-medium">Waktu Mulai</label>
                        <input type="time" id="start_time" name="start_time"
                            value="{{ old('start_time', $schedule->start_time->format('H:i')) }}"
                            placeholder="Masukkan waktu mulai" class="input">
                        @error('start_time')
                            <span class="input__message input__message--destructive">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label for="end_time" class="text-[18px] font-medium">Waktu Selesai</label>
                        <input type="time" id="end_time" name="end_time"
                            value="{{ old('end_time', $schedule->end_time->format('H:i')) }}"
                            placeholder="Masukkan waktu selesai" class="input">
                        @error('end_time')
                            <span class="input__message input__message--destructive">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-1.5" x-data="entityPicker('staff')" x-init="selectedItemId = '{{ old('user_id', $schedule->user_id) }}';
                selectedItemName = '{{ old('staff_name', $schedule->practitioner->name) }}'">
                    <label class="text-[18px] font-medium">Dokter/ Perawat</label>
                    <div class="flex items-center gap-2">
                        <input type="hidden" name="user_id" x-model="selectedItemId">
                        <input type="text" x-model="selectedItemName" placeholder="Pilih dokter/perawat" readonly
                            class="input grow">

                        <button type="button" class="button button--primary-outline" @click="open">
                            Cari
                        </button>

                        <dialog x-ref="dialog" class="dialog">
                            <div class="bg-white w-full max-w-2xl p-6 rounded-xl flex flex-col gap-4" data-slot="box">
                                <div class="dialog__header">
                                    <h3 class="text-lg font-semibold">Pilih Dokter/Perawat</h3>
                                </div>

                                <div class="dialog__content">
                                    <div class="flex justify-end pt-1 pr-1">
                                        <div class="relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="absolute left-3 top-1/2 -translate-y-1/2 size-4 text-muted-foreground">
                                                <path d="m21 21-4.34-4.34" />
                                                <circle cx="11" cy="11" r="8" />
                                            </svg>
                                            <input type="search" placeholder="Cari nama dokter/perawat"
                                                class="pl-10 h-10 px-3 border border-border rounded-lg text-sm focus-within:outline-none focus-within:ring-1 focus-within:ring-primary focus-within:border-primary"
                                                x-on:input.debounce="search($event.target.value)" />
                                        </div>
                                    </div>
                                    <div class="overflow-x-auto py-2">
                                        <table class="table table--rounded">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Dokter/Perawat</th>
                                                    <th>Tgl Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Role</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr data-spacer>
                                                    <td colspan="99" class="h-3 p-0"></td>
                                                </tr>

                                                <template x-for="(items, index) in paginator.data"
                                                    :key="items.id">
                                                    <tr class="bg-white even:bg-muted">
                                                        <td class="text-center" x-text="paginator.meta.from + index">
                                                        </td>
                                                        <td x-text="items.name"></td>
                                                        <td x-text="items.birthDate"></td>
                                                        <td x-text="items.gender"></td>
                                                        <td>
                                                            <span class="capitalize badge" x-text="items.role"
                                                                :class="{
                                                                    'badge--primary-muted': items.role === 'dokter',
                                                                    'badge--info-muted': items.role === 'perawat',
                                                                }"></span>
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="button bg-primary button--primary button--sm"
                                                                @click="selectItem(items)">
                                                                Pilih
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="flex justify-between items-center">
                                        <p class="text-muted-foreground text-xs" x-text="paginationInfo">

                                        </p>

                                        <div class="flex items-center gap-2">
                                            <button type="button" class="button button--icon"
                                                :disabled="paginator.meta.current_page === 1"
                                                @click="goToPage(paginator.meta.current_page - 1)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="size-4">
                                                    <path d="m15 18-6-6 6-6" />
                                                </svg>
                                            </button>

                                            <span class="text-muted-foreground text-xs"
                                                x-text="`${paginator.meta.current_page} of ${paginator.meta.last_page}`"></span>

                                            <button type="button" class="button button--icon"
                                                :disabled="paginator.meta.current_page === paginator.meta.last_page"
                                                @click="goToPage(paginator.meta.current_page + 1)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="size-4">
                                                    <path d="m9 18 6-6-6-6" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="dialog__footer justify-end">
                                    <button type="button" class="button" @click="close()">Close</button>
                                </div>
                            </div>
                        </dialog>

                        @error('user_id')
                            <span class="input__message input__message--destructive">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="status" class="text-[18px] font-medium">Status</label>
                    <select name="status" id="status" class="input">
                        <option value="" disabled {{ old('status', $schedule->status) ? '' : 'selected' }}>Pilih
                        </option>
                        <option value="menunggu"
                            {{ old('status', $schedule->status) === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="selesai"
                            {{ old('status', $schedule->status) === 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    @error('status')
                        <span class="input__message input__message--destructive">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit" class="button bg-primary text-primary-foreground border-primary"
                        x-bind:disabled="disabled">
                        Simpan
                    </button>

                    <button type="submit" form="delete-form" class="button text-destructive border-destructive">
                        Hapus Data
                    </button>
                </div>
            </form>

            <form id="delete-form" action="{{ route('schedules.destroy', $schedule) }}" method="POST"
                class="hidden"
                data-alert="Apakah Anda yakin ingin menghapus data jadwal terapi ini? Data yang dihapus tidak dapat dikembalikan.">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-layout.dashboard>
