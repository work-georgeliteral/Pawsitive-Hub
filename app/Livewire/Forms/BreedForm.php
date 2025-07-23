<?php

namespace App\Livewire\Forms;

use App\Http\Requests\BreedRequest;
use App\Models\Breed;
use Livewire\Form;

class BreedForm extends Form
{
    public ?Breed $breed;

    public ?string $name;

    public ?string $type;

    public function rules(): array
    {
        return (new BreedRequest)->rules();
    }

    public function store()
    {
        $this->validate();

        Breed::create($this->pull());
    }

    public function put()
    {
        $this->breed->update($this->pull());
    }

    public function setBreed(Breed $breed)
    {
        $this->breed = $breed;

        $this->name = $breed->name;

        $this->type = $breed->type;
    }
}
