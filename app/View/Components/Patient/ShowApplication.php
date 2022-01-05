<?php

namespace App\View\Components\Patient;

use App\Models\Vaccine;
use Illuminate\View\Component;

class ShowApplication extends Component
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
        return view('components.patient.show-application');
    }

    public function vaccName($id) {
        $vacc = Vaccine::where('id', $id)->first();
        return $vacc->name;
    }
}
