<div>
    <div class="row gy-4">
        <x-card subtitle="Records">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Breed</th>
                        <th>Age</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Gender</th>
                        <th>Type</th>
                        <th>Activity Level</th>
                        <th colspan="2">Status</th>
                    </thead>
                    <tbody>
                        @forelse ($pets as $pet)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pet->name }}</td>
                            <td>{{ $pet->breed->name }}</td>
                            <td>{{ $pet->age }}</td>
                            <td>{{ $pet->color }}</td>
                            <td>{{ $pet->size }}</td>
                            <td>{{ $pet->gender }}</td>
                            <td>{{ $pet->type }}</td>
                            <td>
                                @if ($pet->activity_level === 'High')
                                <span class="badge text-bg-warning w-25">{{ $pet->activity_level }}</span>
                                @elseif ($pet->activity_level === 'Moderate')
                                <span class="badge text-bg-primary w-25">{{ $pet->activity_level }}</span>
                                @elseif ($pet->activity_level === 'Low')
                                <span class="badge text-bg-secondary w-25">{{ $pet->activity_level }}</span>
                                @else
                                <span class="badge text-bg-primary">{{ $pet->activity_level }}</span>
                                @endif
                            </td>
                            <td>{{ $pet->status }}</td>
                            <td>
                                <i class="lni lni-more" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" data-name="{{ $pet->name }}" data-description="{{ $pet->description }}" data-age="{{ $pet->age }}" data-color="{{ $pet->color }}" data-size="{{ $pet->size }}" data-gender="{{ $pet->gender }}" data-activity-level="{{ $pet->activity_level }}">View</a>
                                    <a href="/pets/edit/{{ $pet->id }}" wire:navigate class="dropdown-item">Edit</a>
                                    <a type="button" wire:click="delete({{ $pet->id }})" wire:confirm="Are you sure?" class="dropdown-item">Delete</a>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr colspan="10">
                            <td>No data yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $pets->links() }}
            </div>
        </x-card>
    </div>
</div>
