<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCard extends Component
{
    public $link;

    public $title;

    public $petsCount;

    public $catsCount;

    public $dogsCount;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link = '', $title = '', $petsCount = 0, $catsCount = 0, $dogsCount = 0)
    {
        $this->link = $link;
        $this->title = $title;
        $this->petsCount = $petsCount;
        $this->catsCount = $catsCount;
        $this->dogsCount = $dogsCount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-card');
    }
}
