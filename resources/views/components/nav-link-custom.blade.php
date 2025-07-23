@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link fw-bold active'
            : 'nav-link';

$styles = ($active ?? false)
            ? 'color: violet;'
            : '';
@endphp

<a {{ $attributes->merge(['class' => $classes, 'style' => $styles]) }}>
    {{ $slot }}
</a>
