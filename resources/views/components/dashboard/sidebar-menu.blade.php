@php
    $req = request();
@endphp

@if($user->isAn("admin"))
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
             fill="none" class="size-5">
             <rect x="4" y="2" width="16" height="20" rx="2" stroke="currentColor"
                 stroke-width="2" />
             <path d="M12 8v8M8 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
         </svg>

         <span>
             Data Pasien
         </span>
     </a>
 </li>

 <li>
     <a href="/jadwal-terapi"
         class="flex items-center gap-4 px-6 py-4 data-active:bg-primary data-active:text-primary-foreground rounded-2xl"
         @if ($req->is('jadwal-terapi*')) data-active @endif>
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
     <a href="/kasir"
         class="flex items-center gap-4 px-6 py-4 data-active:bg-primary data-active:text-primary-foreground rounded-2xl"
         @if ($req->is('kasir*')) data-active @endif>
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
             fill="none" class="size-5">
             <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
             <path d="M12 7v10M8 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
         </svg>

         <span>
             Kasir
         </span>
     </a>
 </li>

 <li>
     <a href="/staff"
         class="flex items-center gap-4 px-6 py-4 data-active:bg-primary data-active:text-primary-foreground rounded-2xl"
         @if ($req->is('staff*')) data-active @endif>
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
             fill="none" class="size-5">
             <circle cx="12" cy="9" r="4" stroke="currentColor" stroke-width="2" />
             <path d="M5.5 20v-2a4 4 0 014-4h5a4 4 0 014 4v2" stroke="currentColor" stroke-width="2" />
             <path d="M12 7v4M10 9h4" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
         </svg>
         <span>
             Dokter/Perawat
         </span>
     </a>
 </li>
@else
<li>
    <a href="/staff/jadwal-terapi"
        class="flex items-center gap-4 px-6 py-4 data-active:bg-primary data-active:text-primary-foreground rounded-2xl"
        @if ($req->is('staff/jadwal-terapi*')) data-active @endif>
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
    <a href="/staff/data-pasien"
        class="flex items-center gap-4 px-6 py-4 data-active:bg-primary data-active:text-primary-foreground rounded-2xl"
        @if ($req->is('staff/data-pasien*')) data-active @endif>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" class="size-5">
                <rect x="4" y="2" width="16" height="20" rx="2" stroke="currentColor"
                    stroke-width="2" />
                <path d="M12 8v8M8 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>

        <span>
            Data Pasien
        </span>
    </a>
</li>
@endif
