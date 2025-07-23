<?php

namespace App\Livewire\Forms;

use App\Http\Requests\PetRequest;
use App\Models\Pet;
use Livewire\Form;

class PetForm extends Form
{
    public ?Pet $pet;

    public ?int $breed_id;

    public ?string $name;

    public ?int $age;

    public ?string $color;

    public ?string $size;

    public ?string $gender;

    public ?string $type;

    public ?string $description;

    public ?string $activity_level;

    public ?string $images_folder;

    public function rules(): array
    {
        return (new PetRequest)->rules();
    }

    public function store()
    {
        $this->validate();

        // Ensure integer values are cast correctly
        $this->breed_id = (int) $this->breed_id;
        $this->age = (int) $this->age;

        Pet::create($this->pull());
    }

    public function put()
    {
        // Ensure integer values are cast correctly
        $this->breed_id = (int) $this->breed_id;
        $this->age = (int) $this->age;

        $this->pet->update($this->pull());
    }

    public function setPet(Pet $pet)
    {
        $this->pet = $pet;
        $this->breed_id = $pet->breed_id;
        $this->name = $pet->name;
        $this->age = $pet->age;
        $this->color = $pet->color;
        $this->size = $pet->size;
        $this->gender = $pet->gender;
        $this->type = $pet->type;
        $this->description = $pet->description;
        $this->activity_level = $pet->activity_level;
        $this->images_folder = $pet->images_folder;
    }
}
