<?php

namespace App\Livewire\Admin\Pet;

use App\Livewire\Forms\PetForm;
use App\Models\Breed;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public PetForm $form;

    public $photos = [];

    public string $type;

    public function mount(string $type)
    {
        $this->type = $type;
    }

    public function save()
    {
        $uniqueFolder = uniqid();

        $this->form->type = ucfirst($this->type);
        $this->form->images_folder = $uniqueFolder;
        $this->form->store();

        foreach ($this->photos as $photo) {
            $photo->store($uniqueFolder, 'public');
            $photo->delete();
        }

        return $this->redirect('/pets', navigate: true);
    }

    public function render()
    {
        $breeds = Breed::where('type', $this->type)->get();
        $types = ['Dog', 'Cat'];
        $levels = ['High', 'Moderate', 'Low'];
        $genders = ['Male', 'Female'];

        return view('livewire.admin.pet.create',
            [
                'breeds' => $breeds,
                'types' => $types,
                'levels' => $levels,
                'genders' => $genders,
            ]
        );
    }
}
