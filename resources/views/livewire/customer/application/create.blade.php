<div class="row justify-content-center" style="margin-top: 70px;">
    <div class="col-sm-12 col-md-12 col-lg-4">
        <div class="card rounded-4 shadow-lg">
            <div id="flip" class="flip-container">
                <div class="flipper">
                    <div class="front p-3">
                        <div id="carousel-{{ $pet->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($pet->image_filenames as $index => $filename)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('pet-images/' . $pet->images_folder . '/' . $filename) }}" class="d-block w-100 rounded-3" alt="{{ $pet->name }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $pet->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $pet->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="back p-4">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ url('/pets/view-pet/' . $pet->id) }}" alt="QR Code" class="rounded-4" />

                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col text-start">
                        <h5 class="card-title">{{ $pet->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $pet->breed->name }}</h6>
                        <p>{{ $pet->status }}</p>
                    </div>
                    <div class="col align-content-center text-end">
                        
                        <button class="btn p-0" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="View details">
                                <i class="lni lni-eye text-dark me-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pet->id }}"></i>
                        </button>
                        <button class="btn p-0 me-2" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="Share link"
                            onclick="copyToClipboard('{{ url('/pets/view-pet/' . $pet->id) }}')">
                            <i class="lni lni-share"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-body">
                <form wire:submit="store">
                    <ul class="nav nav-tabs" id="adoptionFormTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Reason For Adopting</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="family-tab" data-bs-toggle="tab" data-bs-target="#family" type="button" role="tab" aria-controls="family" aria-selected="false">Family Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="residence-tab" data-bs-toggle="tab" data-bs-target="#residence" type="button" role="tab" aria-controls="residence" aria-selected="false">Residence Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pet-tab" data-bs-toggle="tab" data-bs-target="#pet" type="button" role="tab" aria-controls="pet" aria-selected="false">Pet Info</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="adoptionFormTabsContent">
                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <div class="row mt-3">
                                <div class="col-md-12 mb-3">
                                    <x-textarea-custom model="form.reason" placeholder="I want to adopt a pet because" label="Reason for Adopting" rows="4"/>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="showNextTab('family')">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
                            <div class="row mt-3">
                                <div class="col-md-6 mb-3">
                                    <x-select-custom model="form.children_present" label="Are there children below 18 in your house?"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-select-custom model="form.other_pets" label="Do you have other pets?"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-select-custom model="form.family_favor" label="Are your family in favour of having a new pet?"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-select-custom model="form.family_allergy" label="Are any family members allergic to pets?"/>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="showNextTab('residence')">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="residence" role="tabpanel" aria-labelledby="residence-tab">
                            <div class="row mt-3">
                                <div class="col-md-12 mb-3">
                                    <x-input-custom model="form.building_type" placeholder="Regular house" label="What type of building do you live in?"/>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <x-textarea-custom model="form.residence_policies" placeholder="Pets should not..." label="If you are renting or living in a shared building, what are the pet policies in your place?" rows="4"/>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" onclick="showNextTab('pet')">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pet" role="tabpanel" aria-labelledby="pet-tab">
                            <div class="row mt-3">
                                <div class="col-md-6 mb-3">
                                    <x-input-custom model="form.whom" placeholder="Enter Adopters Fullname" label="To whom is the pet for?"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-custom model="form.financer" placeholder="Me" label="Who will finance the pet's checkup?"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-custom model="form.carer" placeholder="Enter Adopters Fullname" label="Who will care for the pet?"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-custom model="form.pet_place" placeholder="Describe the place where the pet will stay" label="Where will your cat/dog stay once adopted?"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-custom model="form.litterbox_place" placeholder="Describe the place where the litterbox will be located" label="Where will be the litter box located?"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-select-custom model="form.prepared_odour" label="Are you prepared for the unpleasant odour of your cat/dog feces?"/>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <x-input-custom type="file" model="form.selfie" label="Upload selfie with your ID" id="selfie"/>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal{{ $pet->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $pet->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
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
                                <td>{{ $pet->size }} kg</td>
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
</div>

<script>
function showNextTab(tabId) {
    var nextTab = document.querySelector(`button[data-bs-target='#${tabId}']`);
    if (nextTab) {
        nextTab.click();
    }
}
</script>
