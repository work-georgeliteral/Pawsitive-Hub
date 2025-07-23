<?php

namespace App\Livewire\Admin\Pet;

use App\Http\Requests\PetRequest;
use App\Livewire\Forms\PetForm;
use App\Models\Breed;
use App\Models\Pet;
use Livewire\Component;

class Edit extends Component
{
    public PetForm $form;

    public function mount($id)
    {
        $pet = Pet::findOrFail($id);
        $this->form->setPet($pet);
    }

    public function rules(): array
    {
        return (new PetRequest)->rules();
    }

    public function put()
    {
        $this->form->put();

        return $this->redirect('/pets', navigate: true);
    }

    public function render()
    {
        $breeds = Breed::all();
        $types = ['Dog', 'Cat'];
        $levels = ['High', 'Moderate', 'Low'];
        $genders = ['Male', 'Female'];

        return view('livewire.admin.pet.edit',
            [
                'breeds' => $breeds,
                'types' => $types,
                'levels' => $levels,
                'genders' => $genders,
            ]
        );
    }
}
