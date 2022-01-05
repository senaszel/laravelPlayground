<?php

namespace App\View\Components\Patient;

use Illuminate\View\Component;

class IndexPatientsApplications extends Component
{
    public $applications;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($applications)
    {
        $this->applications = $applications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.patient.index-patients-applications');
    }
}
