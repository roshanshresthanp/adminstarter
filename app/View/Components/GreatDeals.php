<?php

namespace App\View\Components;

use App\Models\Services;
use App\Models\ServiceType;
use Illuminate\View\Component;

class GreatDeals extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.great-deals')
        ->with('serviceType', ServiceType::latest()->get());
    }


}
