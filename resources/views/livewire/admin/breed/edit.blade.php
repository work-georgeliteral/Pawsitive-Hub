<div class="row justify-content-center">
    <div class="col-lg-4">
        <x-card title="Edit Breed" subtitle="Please fill in the details below">
            <form wire:submit="put">
                <div class="row">
                    <div class="col-md-12">
                        <x-input-custom model="form.name" placeholder="Dalmatian" label="Breed's Name"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
            </form>
        </x-card>
    </div>
</div>