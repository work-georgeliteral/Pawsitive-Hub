<?php

namespace App\Livewire\Admin\Application;

use App\Models\Application;
use App\Models\Pet;
use Livewire\Component;

class Show extends Component
{
    public string $appointmentDate;

    public Application $application;

    public function mount($id)
    {
        $application = Application::findOrFail($id);
        $this->application = $application;
    }

    public function reject()
    {
        $this->authorize('update', $this->application);
        $this->application->status = 'Rejected';
        $this->application->appointment_date = null;
        $this->application->save();
        $this->redirect('/applications', navigate: true);
    }

    public function put()
    {
        $pet = Pet::findOrFail($this->application->pet_id);
        $this->authorize('update', $this->application);
        $pet->status = 'Adopted';
        $pet->save();
        $this->application->status = 'Approved';
        $this->application->appointment_date = $this->appointmentDate;
        $this->application->save();
        $this->redirect('/applications', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.application.show', ['application' => $this->application]);
    }
}
