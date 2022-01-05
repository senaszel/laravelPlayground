<?php

namespace App\View\Components\Patient;

use App\Models\Vaccine;
use Illuminate\View\Component;

class CreateApplication extends Component
{
    public $vaccines;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->vaccines = Vaccine::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.patient.create-application');
    }
}
