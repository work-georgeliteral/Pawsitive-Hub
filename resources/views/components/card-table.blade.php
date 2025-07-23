@props(['title' => '', 'filterApplications' => false])
<div class="card shadow-lg">
    <div class="card-body">
        <div class="card-title d-flex justify-content-between gap-2">
            <h1>{{ $title }}</h1>
            <div class="d-flex align-items-center gap-2" style="width:400px">
                <input wire:model.live.debounce.250ms="search" type="text" class="form-control w-75" placeholder="Search..">

                @if ($filterApplications)
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-2">Filter</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#" wire:click="$dispatch('filterApplications', { selectedStatus: 'All' })">All</a></li>
                            <li><a class="dropdown-item" href="#" wire:click="$dispatch('filterApplications', { selectedStatus: 'Pending' })">Pending</a></li>
                            <li><a class="dropdown-item" href="#" wire:click="$dispatch('filterApplications', { selectedStatus: 'Rejected' })">Rejected</a></li>
                            <li><a class="dropdown-item" href="#" wire:click="$dispatch('filterApplications', { selectedStatus: 'Approved' })">Approved</a></li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        {{ $slot }}
    </div>
</div>
