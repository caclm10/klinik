@props(['title', 'searchPlaceholder' => null])

<div class="flex items-center gap-3">
    <h1 class="font-extrabold text-3xl">{{ $title }}</h1>

    <div class="grow"></div>

    <div class="flex items-center gap-3">
        @if ($searchPlaceholder)
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="absolute left-3 top-1/2 -translate-y-1/2 size-4 text-muted-foreground">
                    <path d="m21 21-4.34-4.34" />
                    <circle cx="11" cy="11" r="8" />
                </svg>

                <input type="search" placeholder="{{ $searchPlaceholder }}" class="input pl-10">
            </div>
        @endif

        {{ $actions ?? '' }}
    </div>
</div>
