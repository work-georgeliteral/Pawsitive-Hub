<div class="container" style="margin-top: 70px;">
    <x-card title="Add a Pet" subtitle="Please provide the details below">
        <form wire:submit="save">
            <!-- Breed, Type, and Name -->
            <div class="row mb-3">
                <div class="col-md-4 mb-3">
                    <x-select-custom model="form.breed_id" selected="Select breed" label="Breed" :options="$breeds"/>
                </div>
                <div class="col-md-4 mb-3">
                    <x-input-custom model="form.name" placeholder="Milo" label="Pet's Name"/>
                </div>
            </div>

            <!-- Age, Color, and Size -->
            <div class="row mb-3">
                <div class="col-md-4 mb-3">
                    <x-input-custom type="number" model="form.age" placeholder="Ex: 3" label="Pet's Age (in years)"/>
                </div>
                <div class="col-md-4 mb-3">
                    <x-input-custom model="form.color" placeholder="Toasted Brown" label="Pet's Overall Color"/>
                </div>
                <div class="col-md-4 mb-3">
                    <x-input-custom type="number" model="form.size" placeholder="Ex: 4" label="Pet's Size (in kg)"/>
                </div>
            </div>

            <!-- Activity Level, Gender, and Description -->
            <div class="row mb-3">
                <div class="col-md-4 mb-3">
                    <x-select-custom model="form.activity_level" selected="Select activity level" label="Activity Level" :options="$levels"/>
                </div>
                <div class="col-md-4 mb-3">
                    <x-radio-custom model="form.gender" label="Pet's Gender" :options="$genders"/>
                </div>

                <!-- Pet Photo -->
                <div class="col">
                    <input type="file" wire:model="photos" label="Pet's Photo/s" class="form-control" multiple>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <x-textarea-custom model="form.description" placeholder="Chonker, the majestic orange tabby who's ready to steal your heart! This gentle giant is a true cuddlebug, loving nothing more than a soft lap to lounge on." label="Pet's Description"/>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Add Pet</button>
        </form>
    </x-card>
</div>
