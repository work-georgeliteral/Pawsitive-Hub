<div>
@if ($customerApplications->isEmpty())
    <h1 class="display-4 text-center" style="margin-top: 80px;">No data yet</h1>
@else
    <div class="row justify-content-center">
        <div class="col col-lg-8">
            <h1 class="display-4 text-center mb-4" style="margin-top: 80px;">My Applications</h1>
            <div wire:poll.15s class="accordion shadow-lg" id="accordionExample">
                @foreach ($customerApplications as $application)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" 
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $application->id }}" aria-expanded="true" aria-controls="collapse{{ $application->id }}">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="fw-bold">Application #{{ $loop->iteration }}</span>
                                <span class="flex-grow-1 text-center">{{ $application->pet->name }}</span>
                                <span class="me-2 badge 
                                    @if ($application->status === 'Pending')
                                        bg-primary text-light
                                    @elseif ($application->status === 'Approved')
                                        bg-success text-light
                                    @elseif ($application->status === 'Rejected')
                                        bg-danger text-light
                                    @endif
                                ">{{ $application->status }}</span>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse{{ $application->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
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
                                            <x-textarea-custom model="form.reason" placeholder="I want to adopt a pet because" label="Reason for Adopting" rows="4" value="{{ $application->reason ?? 'I love having pets because' }}" disabled="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-6 mb-3">
                                            <x-select-custom model="form.children_present" label="Are there children below 18 in your house?" selected="{{ $application->children_present ?? 'Yes' }}" disabled="true"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <x-select-custom model="form.other_pets" label="Do you have other pets?" selected="{{ $application->other_pets ?? 'No' }}" disabled="true"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <x-select-custom model="form.family_favor" label="Are your family in favour of having a new pet?" selected="{{ $application->family_favor ?? 'Yes' }}" disabled="true"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <x-select-custom model="form.family_allergy" label="Are any family members allergic to pets?" selected="{{ $application->family_allergy ?? 'No' }}" disabled="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="residence" role="tabpanel" aria-labelledby="residence-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-12 mb-3">
                                            <x-input-custom model="form.building_type" placeholder="Regular house" label="What type of building do you live in?" value="{{ $application->building_type ?? 'Regular house' }}" disabled="true"/>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <x-textarea-custom model="form.residence_policies" placeholder="Pets should not..." label="If you are renting or living in a shared building, what are the pet policies in your place?" rows="4" value="{{ $application->residence_policies ?? 'Pets should not...' }}" disabled="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pet" role="tabpanel" aria-labelledby="pet-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-6 mb-3">
                                            <x-input-custom model="form.whom" placeholder="Enter Adopters Fullname" label="To whom is the pet for?" value="{{ $application->whom ?? 'My cousin, Jerry' }}" disabled="true"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <x-input-custom model="form.financer" placeholder="Me" label="Who will finance the pet's checkup?" value="{{ $application->financer ?? 'Me' }}" disabled="true"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <x-input-custom model="form.carer" placeholder="Enter Adopters Fullname" label="Who will care for the pet?" value="{{ $application->carer ?? 'My cousin' }}" disabled="true"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <x-input-custom model="form.pet_place" placeholder="Describe the place where the pet will stay" label="Where will your cat/dog stay once adopted?" value="{{ $application->pet_place ?? 'In the owner\'s house' }}" disabled="true"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <x-input-custom model="form.litterbox_place" placeholder="Describe the place where the litterbox will be located" label="Where will be the litter box located?" value="{{ $application->litterbox_place ?? 'In the owner\'s house' }}" disabled="true"/>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <x-select-custom model="form.prepared_odour" label="Are you prepared for the unpleasant odour of your cat/dog feces?" selected="{{ $application->prepared_odour ?? 'Yes' }}" disabled="true"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button wire:click="delete({{ $application->id }})" wire:confirm="Are you sure?" class="btn btn-danger w-100 mt-3">Cancel</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
</div>
