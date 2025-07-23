<div class="row justify-content-center">
    <div class="col-md-8">
        <x-card title="Edit Pet" subtitle="Please provide the details below">
            <form wire:submit="put">
                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <x-select-custom model="form.breed_id" selected="Select breed" label="Breed" :options="$breeds"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-select-custom model="form.type" selected="Select type" label="Type" :options="$types"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-input-custom model="form.name" placeholder="Milo" label="Pet's Name"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-input-custom type="number" model="form.age" placeholder="Ex: 3" label="Pet's Age (in number of years)"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-input-custom model="form.color" placeholder="Toasted Brown" label="Pet's Overall Color"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-input-custom model="form.size" error="size" placeholder="Ex: 4" label="Pet's Size (in kilograms)"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-select-custom model="form.activity_level" selected="Select activity level" label="Activity Level" :options="$levels"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-radio-custom model="form.gender" label="Pet's Gender" :options="$genders"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <x-textarea-custom model="form.description" placeholder="Chonker, the majestic orange tabby who's ready to steal your heart! This gentle giant is a true cuddlebug, loving nothing more than a soft lap to lounge on." label="Pet's Description"/>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Update</button>
            </form>
        </x-card>
    </div>
</div>