@php
    $req = request();
@endphp

<aside class="fixed left-0 inset-y-0 w-sidebar bg-white py-8.5 flex flex-col gap-12">
    <div class="flex justify-center items-center">
        <img src="{{ asset('logo-genqi.webp') }}" alt="GenQi" class="block w-32">
    </div>

    <menu class="text-sidebar-foreground">
        <ul class="px-8 flex flex-col gap-4">
            <li>
                <a href="/dashboard"
                    class="flex items-center gap-4 px-6 py-4 data-active:bg-primary data-active:text-primary-foreground rounded-2xl"
                    @if ($req->is('dashboard')) data-active @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-5">
                        <path d="M10 15v-3" />
                        <path d="M14 15v-3" />
                        <path d="M18 15v-3" />
                        <path d="M2 8V4" />
                        <path d="M22 6H2" />
                        <path d="M22 8V4" />
                        <path d="M6 15v-3" />
                        <rect x="2" y="12" width="20" height="8" rx="2" />
                    </svg>

                    <span>
                        Dashboard
                    </span>
                </a>
            </li>

            <li>
                <a href="/data-pasien"
                    class="flex items-center gap-4 px-6 py-4 data-active:bg-primary data-active:text-primary-foreground rounded-2xl"
                    @if ($req->is('data-pasien*')) data-active @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-5">
                        <path d="M15 12h-5" />
                        <path d="M15 8h-5" />
                        <path d="M19 17V5a2 2 0 0 0-2-2H4" />
                        <path
                            d="M8 21h12a2 2 0 0 0 2-2v-1a1 1 0 0 0-1-1H11a1 1 0 0 0-1 1v1a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v2a1 1 0 0 0 1 1h3" />
                    </svg>

                    <span>
                        Data Pasien
                    </span>
                </a>
            </li>

            <li>
                <a href="#"
                    class="flex items-center gap-4 px-6 py-4 data-active:bg-primary data-active:text-primary-foreground rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-5">
                        <path d="M11 14h1v4" />
                        <path d="M16 2v4" />
                        <path d="M3 10h18" />
                        <path d="M8 2v4" />
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                    </svg>

                    <span>
                        Jadwal Terapi
                    </span>
                </a>
            </li>

            <li>
                <a href="#"
                    class="flex items-center gap-4 px-6 py-4 data-active:bg-primary data-active:text-primary-foreground rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-5">
                        <path d="M13.744 17.736a6 6 0 1 1-7.48-7.48" />
                        <path d="M15 6h1v4" />
                        <path d="m6.134 14.768.866-.5 2 3.464" />
                        <circle cx="16" cy="8" r="6" />
                    </svg>

                    <span>
                        Kasir
                    </span>
                </a>
            </li>

            <li>
                <a href="#"
                    class="flex items-center gap-4 px-6 py-4 data-active:bg-primary data-active:text-primary-foreground rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="size-5">
                        <path d="M15 13a3 3 0 1 0-6 0" />
                        <path
                            d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                        <circle cx="12" cy="8" r="2" />
                    </svg>
                    <span>
                        Dokter/Perawat
                    </span>
                </a>
            </li>
        </ul>
    </menu>
</aside>
