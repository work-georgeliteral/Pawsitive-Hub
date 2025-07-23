<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApplicationsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Application::select(
            'applications.id',
            'users.name as user_name',
            'pets.name as pet_name',
            'applications.reason',
            'applications.whom',
            'applications.children_present',
            'applications.other_pets',
            'applications.family_favor',
            'applications.family_allergy',
            'applications.financer',
            'applications.carer',
            'applications.building_type',
            'applications.residence_policies',
            'applications.pet_place',
            'applications.litterbox_place',
            'applications.prepared_odour',
            'applications.appointment_date',
            'applications.status'
        )
            ->join('users', 'applications.user_id', '=', 'users.id')
            ->join('pets', 'applications.pet_id', '=', 'pets.id')
            ->orderBy('applications.status')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Adopter',
            'Adoptee',
            'Reason',
            'Whom',
            'Children Present',
            'Other Pets',
            'Family Favor',
            'Family Allergy',
            'Financer',
            'Carer',
            'Building Type',
            'Residence Policies',
            'Pet Place',
            'Litterbox Place',
            'Prepared for Odour',
            'Appointment Date',
            'Status',
        ];
    }
}
