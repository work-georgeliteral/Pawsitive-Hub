<?php

namespace App\Livewire;

use App\Models\Breed;
use App\Models\Pet;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class TableHeader extends Component
{
    #[On('update-pets')]
    public function render()
    {
        $counts = Pet::select(
            DB::raw('COUNT(*) as total_count'),
            DB::raw("SUM(CASE WHEN status = 'Adopted' THEN 1 ELSE 0 END) as adopted_count"),
            DB::raw("SUM(CASE WHEN status = 'New' THEN 1 ELSE 0 END) as new_count"),
            DB::raw("SUM(CASE WHEN type = 'Cat' THEN 1 ELSE 0 END) as cat_count"),
            DB::raw("SUM(CASE WHEN type = 'Dog' THEN 1 ELSE 0 END) as dog_count")
        )
            ->first();

        $breeds = Breed::select('id', 'name')->get();

        return view('livewire.table-header', [
            'breeds' => $breeds,
            'totalCount' => $counts->total_count,
            'adoptedCount' => $counts->adopted_count,
            'newCount' => $counts->new_count,
            'catCount' => $counts->cat_count,
            'dogCount' => $counts->dog_count,
        ]);
    }
}
