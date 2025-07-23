<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardCards extends Component
{
    public function render()
    {
        $petsCounts = DB::table('pets')
            ->select(DB::raw('
                COUNT(*) as total,
                SUM(CASE WHEN type = "Cat" THEN 1 ELSE 0 END) as cats,
                SUM(CASE WHEN type = "Dog" THEN 1 ELSE 0 END) as dogs,
                SUM(CASE WHEN type = "Cat" AND status = "New" THEN 1 ELSE 0 END) as available_cats,
                SUM(CASE WHEN type = "Dog" AND status = "New" THEN 1 ELSE 0 END) as available_dogs,
                SUM(CASE WHEN type = "Cat" AND status = "Adopted" THEN 1 ELSE 0 END) as adopted_cats,
                SUM(CASE WHEN type = "Dog" AND status = "Adopted" THEN 1 ELSE 0 END) as adopted_dogs
            '))
            ->first();

        $applicationsCounts = DB::table('applications')
            ->join('pets', 'applications.pet_id', '=', 'pets.id')
            ->select(DB::raw('
                COUNT(*) as total,
                SUM(CASE WHEN applications.status = "Pending" THEN 1 ELSE 0 END) as pending,
                SUM(CASE WHEN applications.status = "Approved" THEN 1 ELSE 0 END) as approved,
                SUM(CASE WHEN applications.status = "Rejected" THEN 1 ELSE 0 END) as rejected,
                SUM(CASE WHEN applications.status = "Pending" AND pets.type = "Cat" THEN 1 ELSE 0 END) as pending_cats,
                SUM(CASE WHEN applications.status = "Pending" AND pets.type = "Dog" THEN 1 ELSE 0 END) as pending_dogs,
                SUM(CASE WHEN applications.status = "Approved" AND pets.type = "Cat" THEN 1 ELSE 0 END) as approved_cats,
                SUM(CASE WHEN applications.status = "Approved" AND pets.type = "Dog" THEN 1 ELSE 0 END) as approved_dogs,
                SUM(CASE WHEN applications.status = "Rejected" AND pets.type = "Cat" THEN 1 ELSE 0 END) as rejected_cats,
                SUM(CASE WHEN applications.status = "Rejected" AND pets.type = "Dog" THEN 1 ELSE 0 END) as rejected_dogs
            '))
            ->first();

        $usersCount = User::where('type', 'customer')->count();

        return view('livewire.admin.dashboard-cards', [
            // Pets counts
            'totalPetsCount' => $petsCounts->total,
            'availableCatsCount' => $petsCounts->available_cats,
            'availableDogsCount' => $petsCounts->available_dogs,
            'adoptedCatsCount' => $petsCounts->adopted_cats,
            'adoptedDogsCount' => $petsCounts->adopted_dogs,
            'catsCount' => $petsCounts->cats,
            'dogsCount' => $petsCounts->dogs,

            // Applications counts
            'totalApplicationsCount' => $applicationsCounts->total,
            'pendingApplicationsCount' => $applicationsCounts->pending,
            'approvedApplicationsCount' => $applicationsCounts->approved,
            'rejectedApplicationsCount' => $applicationsCounts->rejected,
            'pendingCatsCount' => $applicationsCounts->pending_cats,
            'pendingDogsCount' => $applicationsCounts->pending_dogs,
            'approvedCatsCount' => $applicationsCounts->approved_cats,
            'approvedDogsCount' => $applicationsCounts->approved_dogs,
            'rejectedCatsCount' => $applicationsCounts->rejected_cats,
            'rejectedDogsCount' => $applicationsCounts->rejected_dogs,

            // Users count
            'usersCount' => $usersCount,
        ]);
    }
}
