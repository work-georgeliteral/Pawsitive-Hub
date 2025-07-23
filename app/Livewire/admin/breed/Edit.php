<?php

namespace App\Livewire\Admin\Breed;

use App\Livewire\Forms\BreedForm;
use App\Models\Breed;
use Livewire\Component;

class Edit extends Component
{
    public BreedForm $form;

    public function mount($id)
    {
        $breed = Breed::findOrFail($id);
        $this->form->setBreed($breed);
    }

    public function put()
    {
        $this->form->put();
        $this->redirect('/breeds', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.breed.edit');
    }
}
