<div wire:poll.15s>
    <x-nav-link-custom href="/applications" wire:navigate :active="request()->routeIs('applications/index')">
        Applications @if ($count !== 0) ({{ $count }}) @endif
    </x-nav-link-custom>
</div>
