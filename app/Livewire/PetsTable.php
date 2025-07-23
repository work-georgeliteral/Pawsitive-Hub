<?php

namespace App\Livewire;

use App\Models\Pet;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class PetsTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $orderColumn = 'emp_name';

    public $sortOrder = 'asc';

    public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';

    public $searchTerm = '';

    public function updated()
    {
        $this->resetPage();
    }

    public function sortOrder($columnName = '')
    {
        $caretOrder = 'up';
        if ($this->sortOrder == 'asc') {
            $this->sortOrder = 'desc';
            $caretOrder = 'down';
        } else {

            $this->sortOrder = 'asc';
            $caretOrder = 'up';
        }

        $this->sortLink = '<i class="sorticon fa-solid fa-caret-'.$caretOrder.'"></i>';
        $this->orderColumn = $columnName;
    }

    public function delete($id)
    {
        $pet = Pet::findOrFail($id);
        $folder = public_path('pet-photos/'.$pet->photo);
        File::delete($folder);
        $pet->delete();
    }

    public function render()
    {
        $pets = Pet::with('breed')->paginate(10);

        return view('livewire.admin.pet.pets-table', ['pets' => $pets]);
    }
}
