<?php

namespace App\Livewire\Customer;

use App\Models\Application;
use Livewire\Component;

class MyApplicationsNavItemWithCount extends Component
{
    public function render()
    {
        $count = Application::where('status', 'Approved')
            ->where('appointment_date', '>=', now()->timestamp)
            ->count();

        return view('livewire.customer.my-applications-nav-item-with-count', ['count' => $count]);
    }
}
