<div>
    <div class="row justify-content-center" style="margin-top: 70px;">
        <div class="col-lg align-content-center">
            <x-card-table title="Applications" subtitle="Records" filterApplications=true>
                <div class="table-responsive">
                    <table class="style-table">
                        <thead>
                            <th>#</th>
                            <th>Applicant</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Pet</th>
                            <th>Type</th>
                            <th>Breed</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Appointment Date</th>
                            <th></th>
                        </thead>
                        <tbody class="table-group-divider" wire:poll.15s>
                            @forelse ($applications as $application)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $application->user->name }}</td>
                                <td>{{ $application->user->email }}</td>
                                <td>{{ $application->user->mobile_number }}</td>
                                <td>{{ $application->pet->name }}</td>
                                <td>{{ $application->pet->type }}</td>
                                <td>{{ $application->pet->breed->name }}</td>
                                <td>{{ $application->created_at->format('m/d/Y') }}</td>
                                <td>
                                    @php
                                        $badgeClass = match($application->status) {
                                            'Pending' => 'primary',
                                            'Approved' => 'success',
                                            'Rejected' => 'warning',
                                            default => 'primary',
                                        };
                                    @endphp
                                    <span class="badge text-bg-{{ $badgeClass }} w-75">{{ $application->status }}</span>
                                </td>
                                <td>
                                    {{ $application->appointment_date ?? 'Not set yet' }}
                                </td>
                                <td>
                                    <i class="lni lni-more" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a href="/applications/show/{{ $application->id }}" wire:navigate type="button" class="dropdown-item">View</a>
                                        {{-- <a type="button" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" class="dropdown-item">Approve</a> --}}
                                        <a type="button" wire:click="reject({{ $application->id }})" wire:confirm="Are you sure?" class="dropdown-item">Reject</a>
                                        <a type="button" wire:click="delete({{ $application->id }})" wire:confirm="Are you sure?" class="dropdown-item">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No data yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $applications->links() }}
                </div>
            </x-card-table>
        </div>
    </div>
</div>
