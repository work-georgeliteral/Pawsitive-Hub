<div>
	<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
	    <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Setting Appointment</h1>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	            </div>
	            <div class="modal-body">
	                <x-input-custom type="datetime-local" model="appointmentDate" id="{{ $application->id }}" label="Date of Appointment"/>
	            </div>
	            <div class="modal-footer">
	                <button wire:click="put({{ $application->id }})" class="btn btn-primary w-100">Set Appointment</button>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="row justify-content-start mb-3">
	    <div class="col">
	        <h1 class="display-5" style="margin-top: 80px;">
	            <strong>Applicant:</strong> <span style="font-weight:bold;">{{ $application->user->name }}</span> <br> 
	            <strong>Adoptee:</strong> <span style="font-weight:bold;">{{ $application->pet->name }}</span>
	        </h1>
	    </div>
	</div>

	<div class="row gy-4">
	    <div class="col-sm-12 col-md-6 col-lg-4 align-content-start">
	        <div class="card rounded-4 shadow-lg">
		        <div id="flip" class="flip-container">
	                <div class="flipper">
	                    <div class="front p-3">
	                        <img src="{{ asset('selfies/' . $application->selfie) }}" alt="{{ $application->selfie }}" class="rounded-4" />
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col">
	        <div class="card">
	        	<div class="card-body">
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
	        		            <div class="col-lg-12">
	        		            	<div class="row">
	        		            		<div class="col-sm-12 col-md-4 col-lg-6">
	        		            		    <button class="btn btn-primary w-100" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Approve</button>
	        		            		</div>
	        		            		<div class="col-sm-12 col-md-4 col-lg-6">
	        		            		    <button type="button" wire:click="reject({{ $application->id }})" wire:confirm="Are you sure?" class="btn btn-danger w-100">Reject</button>
	        		            		</div>
	        		            	</div>
	        		            </div>
	        		        </div>
	        		    </div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	</div>
</div>