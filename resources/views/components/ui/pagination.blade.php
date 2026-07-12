@props(['paginator', 'query' => []])

@php
$paginator = $paginator->appends($query);
@endphp

<div class="flex justify-between items-center">
    <p class="text-muted-foreground text-xs">
        {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} dari {{ $paginator->total() }} Data
    </p>

    <div class="flex items-center gap-2">
        @if ($paginator->onFirstPage())
            <button type="button" class="button button--icon button--muted" aria-label="Previous page" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="size-4">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="button button--icon button--primary"
                aria-label="Previous page">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="size-4">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </a>
        @endif

        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page === $paginator->currentPage())
                <button type="button" class="button button--icon button--muted" aria-current="page" disabled>
                    {{ $page }}
                </button>
            @else
                <a href="{{ $url }}" class="button button--icon button--primary">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="button button--icon button--primary"
                aria-label="Next page">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="size-4">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </a>
        @else
            <button type="button" class="button button--icon button--muted" aria-label="Next page" disabled>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="size-4">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </button>
        @endif
    </div>
</div>
