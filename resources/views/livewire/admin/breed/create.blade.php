<div class="row justify-content-center" style="margin-top: 80px;">
    <div class="col-lg-4">
        <x-card title="Add a breed" subtitle="Please fill in the details below">
            <form wire:submit="store">
                <div class="row">
                    <div class="col-lg-12">
                        <x-input-custom model="form.name" placeholder="Dalmatian" label="Breed's Name"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
            </form>
        </x-card>
    </div>
</div>