<?php

namespace App\Livewire\Admin\Breed;

use App\Models\Breed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $orderColumn = 'emp_name';

    public $sortOrder = 'asc';

    public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';

    public $search = '';

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
        $breed = Breed::findOrFail($id);
        $breed->delete();
    }

    public function render()
    {
        $breeds = Breed::withCount('pets')
            ->search($this->search)
            ->paginate(10);

        return view('livewire.admin.breed.index', ['breeds' => $breeds]);
    }
}
