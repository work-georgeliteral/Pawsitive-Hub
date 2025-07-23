<?php

namespace App\Livewire\Customer\Application;

use App\Livewire\Forms\ApplicationForm;
use App\Models\Pet;
use App\Models\Temporary;
use Illuminate\Http\Request;
use Livewire\Component;

class Create extends Component
{
    public ApplicationForm $form;

    public Pet $pet;

    public function mount($id)
    {
        $this->pet = Pet::findOrFail($id);
        $this->form->pet_id = $this->pet->id;
        $folderPath = public_path('pet-images/'.$this->pet->images_folder);
        $files = glob($folderPath.'/*');
        $this->pet->image_filenames = array_map('basename', $files);
    }

    public function store()
    {

        $temporary = Temporary::latest()->first();
        $this->form->selfie = $temporary->folder.$temporary->filename ?? '';
        $this->form->store();

        return $this->redirect('/pets/my-applications', navigate: true);
    }

    public function getSelfie(Request $request)
    {
        if ($request->hasFile('selfie')) {
            $file = $request->file('selfie');
            $fileName = $file->getClientOriginalName();
            $folder = uniqid();
            $file->move(public_path('selfies'), $folder.$fileName);

            Temporary::create([
                'folder' => $folder,
                'filename' => $fileName,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.customer.application.create', ['pet' => $this->pet]);
    }
}
