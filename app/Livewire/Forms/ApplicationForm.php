<?php

namespace App\Livewire\Forms;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use Livewire\Form;

class ApplicationForm extends Form
{
    public ?string $user_id;

    public ?string $pet_id;

    public ?string $reason;

    public ?string $whom;

    public ?string $children_present;

    public ?string $other_pets;

    public ?string $family_favor;

    public ?string $family_allergy;

    public ?string $financer;

    public ?string $carer;

    public ?string $building_type;

    public ?string $residence_policies;

    public ?string $pet_place;

    public ?string $litterbox_place;

    public ?string $prepared_odour;

    public ?string $selfie;

    public function rules(): array
    {
        return (new ApplicationRequest)->rules();
    }

    public function store()
    {
        $this->user_id = auth()->id();
        $this->pet_id = $this->pet_id;
        $this->validate();
        Application::create($this->pull());
    }
}
