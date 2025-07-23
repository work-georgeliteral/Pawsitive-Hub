<div class="custom-div">
    @if ($totalCount > 0)
    <div class="row flex-wrap refine-search-container">
        <!-- Search Input -->
        {{-- <div class="col mb-3">
            <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="Search..">
        </div> --}}
        <h3 class="mb-3">Refine your search</h3>
        <!-- Select for Pet Type -->
        <div class="col-lg-12 mb-3">
            <label for="petTypeSelect" class="form-label">Pet Type</label>
            <select id="petTypeSelect" class="form-select" aria-label="Pet Type" wire:change="$dispatch('filterType', { type: $event.target.value })">
                <option value="">All</option>
                <option value="Cat">Cats ({{ $catCount ?? 0 }})</option>
                <option value="Dog">Dogs ({{ $dogCount ?? 0 }})</option>
            </select>
        </div>

        <!-- Select for Breed -->
        <div class="col-lg-12 mb-3">
            <label for="breedSelect" class="form-label">Breed</label>
            <select id="breedSelect" class="form-select" aria-label="Breed" wire:change="$dispatch('filterBreed', { breed_id: $event.target.value })">
                <option value="">All</option>
                @foreach ($breeds as $breed)
                    <option value="{{ $breed->id }}">{{ $breed->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Select for Adoption Status -->
        <div class="col-lg-12 mb-3">
            <label for="statusSelect" class="form-label">Adoption Status</label>
            <select id="statusSelect" class="form-select" aria-label="Adoption Status" wire:change="$dispatch('filterStatus', { status: $event.target.value })">
                <option value="">All</option>
                <option value="New">Available ({{ $newCount ?? 0 }})</option>
                <option value="Adopted">Adopted ({{ $adoptedCount ?? 0 }})</option>
            </select>
        </div>

        <!-- Select for Activity Level -->
        <div class="col-lg-12 mb-3">
            <label for="activityLevelSelect" class="form-label">Activity Level</label>
            <select id="activityLevelSelect" class="form-select" aria-label="Activity Level" wire:change="$dispatch('filterActivityLevel', { activityLevel: $event.target.value })">
                <option value="">All</option>
                <option value="High">High</option>
                <option value="Moderate">Moderate</option>
                <option value="Low">Low</option>
            </select>
        </div>

        <!-- Select for Gender -->
        <div class="col-lg-12 mb-3">
            <label for="genderSelect" class="form-label">Gender</label>
            <select id="genderSelect" class="form-select" aria-label="Gender" wire:change="$dispatch('filterGender', { gender: $event.target.value })">
                <option value="">All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
@endif
</div>

<style>
.custom-div {
    background-color: #250046;
    color: white;
    padding: 20px;
    display: flex;
    position: fixed;
    top: 70px;
    width: 15%;
    height: 90vh; /* Set a maximum height */
    left: 0;
    overflow-y: auto; /* Add scrollbar if content exceeds height */
    box-sizing: border-box; /* Includes padding in the total height */
}


.refine-search-container {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
}

.refine-search-container > div {
    flex: 1 1 calc(25% - 5px);
    min-width: 120px;
}

@media (max-width: 767px) {
    .refine-search-container > div {
        flex: 1 1 calc(50% - 5px);
        min-width: 100%;
    }
}

.custom-div h3 {
    width: 100%;
    margin-bottom: 15px;
}
</style>

