<?php

namespace App\Exports;

use App\Models\Pet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PetsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pet::select(
            'pets.id',
            'breeds.name as breed_name',
            'pets.name',
            'pets.age',
            'pets.color',
            'pets.size',
            'pets.gender',
            'pets.description',
            'pets.activity_level',
            'pets.status',
            'pets.type'
        )
            ->join('breeds', 'pets.breed_id', '=', 'breeds.id')
            ->orderBy('pets.status')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Breed Name',
            'Name',
            'Age',
            'Color',
            'Size',
            'Gender',
            'Description',
            'Activity Level',
            'Status',
            'Type',
        ];
    }
}
