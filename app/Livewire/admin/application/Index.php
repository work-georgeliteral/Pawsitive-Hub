<?php

namespace App\Livewire\Admin\Application;

use App\Models\Application;
use App\Models\Pet;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $switch = false;

    public $switchLabel = 'Table';

    public $orderColumn = 'whom';

    public $sortOrder = 'asc';

    public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';

    public string $appointmentDate;

    public string $search = '';

    public string $selectedStatus = 'All';

    public function delete($id)
    {
        $application = Application::findOrFail($id);
        $folder = public_path('selfies/'.$application->selfie);
        $this->authorize('update', $application);
        $application->delete();
        File::delete($folder);
    }

    public function reject($id)
    {
        $application = Application::findOrFail($id);
        $this->authorize('update', $application);
        $application->status = 'Rejected';
        $application->appointment_date = null;
        $application->save();
        $this->redirect('/applications', navigate: true);
    }

    public function put($id)
    {
        $application = Application::findOrFail($id);
        $pet = Pet::findOrFail($application->pet_id);
        $this->authorize('update', $application);
        $pet->status = 'Adopted';
        $pet->save();
        $application->status = 'Approved';
        $application->appointment_date = $this->appointmentDate;
        $application->save();
        $this->redirect('/applications', navigate: true);
    }

    #[On('filterApplications')]
    public function filterApplications($selectedStatus)
    {
        $this->selectedStatus = $selectedStatus;
        $this->resetPage();
    }

    public function render()
    {
        $query = Application::query();
        if ($this->selectedStatus !== 'All') {
            $query->where('status', $this->selectedStatus);
        }
        $applications = $query->with('user', 'pet')->search($this->search)->paginate(10);

        return view('livewire.admin.application.index', ['applications' => $applications]);
    }
}
