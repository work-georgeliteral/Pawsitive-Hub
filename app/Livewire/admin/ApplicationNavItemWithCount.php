<?php

namespace App\Livewire\Admin;

use App\Models\Application;
use Livewire\Component;

class ApplicationNavItemWithCount extends Component
{
    public function render()
    {
        $count = Application::where('status', 'Pending')->count();

        return view('livewire.admin.application-nav-item-with-count', ['count' => $count]);
    }
}
