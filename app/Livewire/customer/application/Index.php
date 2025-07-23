<?php

namespace App\Livewire\Customer\Application;

use App\Models\Application;
use App\Models\Pet;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public int $id;

    public function delete($id)
    {
        $application = Application::findOrFail($id);
        $folder = public_path('selfies/'.$application->selfie);
        $this->authorize('delete', $application);
        $application->status = 'Cancelled';
        $application->save();
        $pet = Pet::findOrFail($application->pet_id);
        $pet->status = 'New';
        $pet->save();
        File::delete($folder);
    }

    public function render()
    {
        $customerApplications = Application::where('user_id', auth()->id())->get();

        return view('livewire.customer.application.index', ['customerApplications' => $customerApplications]);
    }
}
