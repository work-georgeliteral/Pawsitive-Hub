<?php

namespace App\Livewire\Customer\Pet;

use App\Models\Pet;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Browse extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $orderColumn = 'name';

    public $sortOrder = 'asc';

    public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';

    public $search = '';

    public $filter = '';

    public $status = '';

    public $activityLevel = '';

    public $gender = '';

    public $breed_id = '';

    public $age = null;

    public $size = null;

    public $color = null;

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

    #[On('filterType')]
    public function filterType($type)
    {
        $this->filter = $type;
        $this->resetPage();
    }

    #[On('filterStatus')]
    public function filterStatus($status)
    {
        $this->status = $status;
        $this->resetPage();
    }

    #[On('filterActivityLevel')]
    public function filterActivityLevel($activityLevel)
    {
        $this->activityLevel = $activityLevel;
        $this->resetPage();
    }

    #[On('filterGender')]
    public function filterGender($gender)
    {
        $this->gender = $gender;
        $this->resetPage();
    }

    #[On('filterBreed')]
    public function filterBreed($breed_id)
    {
        $this->breed_id = $breed_id;
        $this->resetPage();
    }

    public function render()
    {
        $query = Pet::query();

        if ($this->filter !== '') {
            $query->where('type', $this->filter);
        }

        if ($this->status !== '') {
            $query->where('status', $this->status);
        }

        if ($this->activityLevel !== '') {
            $query->where('activity_level', $this->activityLevel);
        }

        if ($this->gender !== '') {
            $query->where('gender', $this->gender);
        }

        if ($this->breed_id !== '') {
            $query->where('breed_id', $this->breed_id);
        }

        // Filter by age category
        if ($this->age !== null && $this->age !== '') {
            switch ($this->age) {
                case '1-2 years':
                    $query->whereBetween('age', [1, 2]);
                    break;
                case '2-4 years':
                    $query->whereBetween('age', [2, 4]);
                    break;
                case '5-7 years':
                    $query->whereBetween('age', [5, 7]);
                    break;
                case '8-10 years':
                    $query->whereBetween('age', [8, 10]);
                    break;
                case '11-15 years':
                    $query->whereBetween('age', [11, 15]);
                    break;
            }
        }

         // Filter by size category
         if ($this->size !== null && $this->size !== '') {
            switch ($this->size) {
                case 'small':
                    $query->whereBetween('size', [0, 10]); // small: 0-10 kg
                    break;
                case 'medium':
                    $query->whereBetween('size', [11, 25]); // medium: 11-25 kg
                    break;
                case 'large':
                    $query->whereBetween('size', [26, 40]); // large: 26-40 kg
                    break;
                case 'extra-large':
                    $query->where('size', '>', 40); // extra-large: 40+ kg
                    break;
            }
        }


        $pets = $query->search($this->search, $this->color)
            ->orderBy($this->orderColumn, $this->sortOrder)
            ->paginate(10);

        foreach ($pets as $pet) {
            $folderPath = public_path('pet-images/'.$pet->images_folder);
            $files = glob($folderPath.'/*');
            $pet->image_filenames = array_map('basename', $files);
        }

        return view('livewire.customer.pet.browse', ['pets' => $pets]);
    }
}
