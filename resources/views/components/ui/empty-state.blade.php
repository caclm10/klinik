@props(['title', 'description', 'actionHref', 'actionLabel'])

<div class="flex justify-center">
    <div class="flex flex-col gap-6 mt-8">
        <div class="text-center flex flex-col gap-2">
            <p class="font-semibold text-lg">{{ $title }}</p>
            <p class="text-sm text-muted-foreground">{{ $description }}</p>
        </div>

        <div class="flex justify-center">
            <a href="{{ $actionHref }}" class="button bg-primary text-primary-foreground border-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="size-4">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>

                <span>{{ $actionLabel }}</span>
            </a>
        </div>
    </div>
</div>
