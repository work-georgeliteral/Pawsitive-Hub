<?php

namespace App\Livewire\Admin\Breed;

use App\Livewire\Forms\BreedForm;
use Livewire\Component;

class Create extends Component
{
    public BreedForm $form;

    public string $type;

    public function mount(string $type)
    {
        $this->type = $type;
    }

    public function store()
    {
        $this->form->type = $this->type;
        $this->form->store();
        $this->redirect('/breeds', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.breed.create');
    }
}
