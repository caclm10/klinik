@props([
    'title' => '',
    'description' => '',
])

<div {{ $attributes->class(['alert']) }}>
    {{ $icon ?? '' }}

    <p class="alert__title">{{ $title }}</p>
    <p class="alert__description">{{ $description }}</p>
</div>
