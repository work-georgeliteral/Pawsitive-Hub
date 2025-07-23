<div wire:poll.15s>
    <x-nav-link-custom href="/pets/my-applications" wire:navigate :active="request()->routeIs('pets/my-applications/index')">
            {{ __('My Applications') }} ({{ $count ?? 0 }})
          </x-nav-link-custom>
</div>
