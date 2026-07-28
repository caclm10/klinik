<aside class="fixed left-0 inset-y-0 w-sidebar bg-white py-8.5 flex flex-col gap-12">
    <div class="flex justify-center items-center">
        <img src="{{ asset('logo-genqi.webp') }}" alt="GenQi" class="block w-32">
    </div>

    <menu class="text-sidebar-foreground">
        <ul class="px-8 flex flex-col gap-4">
            <x-dashboard.sidebar-menu />
        </ul>
    </menu>
</aside>
