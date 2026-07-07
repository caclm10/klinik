<header class="py-7 bg-white flex items-center justify-end px-7">
    <div class="relative">
        <button type="button" command="toggle-popover" commandfor="account-menu"
            class="account-trigger flex items-center gap-4 rounded-2xl px-3 py-2 text-left transition hover:bg-muted/40 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-10">
                <path d="M17.925 20.056a6 6 0 0 0-11.851.001" />
                <circle cx="12" cy="11" r="4" />
                <circle cx="12" cy="12" r="10" />
            </svg>

            <div class="flex flex-col min-w-22">
                <span class="font-medium text-sm">Mufqi</span>
                <span class="text-sm text-muted-foreground">Admin</span>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-4">
                <path d="m6 9 6 6 6-6" />
            </svg>
        </button>

        <nav id="account-menu" popover class="account-menu">
            <div class="flex flex-col gap-1 p-2">
                <a href="/account"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium hover:bg-muted">
                    Pengaturan
                </a>

                <a href="/login"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-destructive hover:bg-destructive/10">
                    Keluar
                </a>
            </div>
        </nav>
    </div>
</header>
