<div wire:poll.15s class="custom-container" style="margin-left: -20px; width: 100%; max-width: 1200px;">
    @if ($pets->isEmpty())
        <h1 class="display-1 text-center" style="margin-top: 80px;">No data yet</h1>
        <h5><a href="{{ Cookie::get('previous_page') ?? '/pets/browse' }}">Back</a></h5>
    @else
        <div class="row justify-content-lg-around rounded-3 p-0" style="margin-bottom: -40px;background:#e4e4e4;margin-left: 20px;margin-right: 20px; margin-top:60px;">
            <div class="col-sm-12 col-md-6 col-lg-6 align-content-center" style="padding-left: 20px;">
                Displaying {{ $pets->firstItem() }}-{{ $pets->lastItem() }} pets out of {{ $pets->total() }} pets
            </div>
            <div class="col-md-5 d-flex justify-content-center" style="padding: 0px 10px 8px 10px; border-radius:20px;padding-right: 20px;">
                <div id="filterInputs" class="d-flex gap-2 mt-2 align-items-center">
                    <div title="Search your preferred pet by Name, Age, Size or Color" style="display:flex; flex-direction: column; align-items: center; margin-top: 10px; cursor: pointer;">
                        <i class="fa-solid fa-sliders" style="margin: 0px 0px -6px 0px"></i>
                        <span>Filter</span>
                    </div>
                    <input wire:model.live.debounce.500ms="search" type="text" class="form-control" placeholder="Name.." value="{{ $search }}" style="width: 100px; margin-right: 10px;">
                    <select wire:model.live.debounce.500ms="age" class="dropwdown" style="width:108px; background-color: white; border: none; border-radius:10px; padding:6px; cursor:pointer;">
                        <option value="">Select Age</option>
                        <option value="1-2 years">Young Adult (1-2 years)</option>
                        <option value="2-4 years">Adult (2-4 years)</option>
                        <option value="5-7 years">Mature Adult (5-7 years)</option>
                        <option value="8-10 years">Senior (8-10 years)</option>
                        <option value="11-15 years">Geriatric (11-15 years)</option>
                    </select>

                    <select wire:model.live.debounce.500ms="size" class="dropwdown" style="width:107px; background-color: white; border: none; border-radius:10px; padding:6px; cursor:pointer;">
                        <option value="">Select Size Category</option>
                        <option value="small">Small (0-10 kg)</option>
                        <option value="medium">Medium (11-25 kg)</option>
                        <option value="large">Large (26-40 kg)</option>
                        <option value="extra-large">Extra Large (40+ kg)</option>
                    </select>
                    <input wire:model.live.debounce.500ms="color" type="text" class="form-control" placeholder="Color.." value="{{ $color }}" style="width: 100px; margin-left: 10px;">
                </div>
            </div>
        </div>

        <div class="row justify-content-start gy-4">
            {{ $pets->links() }}
            @foreach ($pets as $pet)
                <x-grid-card :pet="$pet">

                    @if ($pet->status == 'New')
                    <button class="btn border round p-0" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="Apply for adoption"
                        style="padding: 5px 0px 5px 0px; width:100%; font-size:15px;">
                            <i href="/pets/apply/{{ $pet->id }}" wire:navigate class="lni lni-add-files"><span>Adopt</span></i>
                    </button>
                    @endif
                </x-grid-card>

                <div class="modal fade" id="exampleModal{{ $pet->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $pet->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="max-width: 800px; margin: 0 auto;">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">{{ $pet->name }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><strong>Type:</strong></td>
                                            <td>{{ $pet->type }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Breed:</strong></td>
                                            <td>{{ $pet->breed->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Age:</strong></td>
                                            <td>{{ $pet->age }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Color:</strong></td>
                                            <td>{{ $pet->color }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Size:</strong></td>
                                            <td>{{ $pet->size }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Gender:</strong></td>
                                            <td>{{ $pet->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Activity Level:</strong></td>
                                            <td>{{ $pet->activity_level }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <strong>Description:</strong>
                                    <div>{{ $pet->description }}</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $pets->links() }}
        </div>
    @endif
</div>