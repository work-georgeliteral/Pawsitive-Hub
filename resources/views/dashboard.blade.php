<x-app-layout>
    @if (auth()->user()->type == 'customer')
        @livewire('customer.pet.browse')
    @else
        @livewire('dashboard-cards')
    @endif
</x-app-layout>
