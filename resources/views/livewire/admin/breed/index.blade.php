<div>
    <div class="row justify-content-center" style="margin-top: 70px;">
        <div class="col-lg align-content-center">
            <x-card-table title="Breeds">
                <div class="table-responsive">
                    <table class="style-table">
                        <thead>
                            <th>#</th>
                            <th>Breed</th>
                            <th>Quantity</th>
                            <th>Type</th>
                            <th>Action</th>
                            <th></th>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($breeds as $breed)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $breed->name }}</td>
                                <td>{{ $breed->pets_count }}</td>
                                <td>{{ $breed->type }}</td>
                                <td>
                                    <i class="lni lni-more" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a href="/breeds/edit/{{ $breed->id }}" class="dropdown-item">Edit</a>
                                        <a type="button" wire:click="delete({{ $breed->id }})" wire:confirm="Are you sure?" class="dropdown-item">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No data yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $breeds->links() }}
                </div>
            </x-card-table>
        </div>
    </div>
</div>
