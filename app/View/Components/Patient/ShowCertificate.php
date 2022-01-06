<?php

namespace App\View\Components\Patient;

use App\Helpers\VaccName;
use App\Models\Vaccine;
use Illuminate\View\Component;

class ShowCertificate extends Component
{
    public $applications;
    public $application;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($applications,$application)
    {
        $this->applications = $applications;
        $this->application = $application;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.patient.show-certificate');
    }

    public function vaccName($id) {
        return VaccName::getById($id);
    }
}
