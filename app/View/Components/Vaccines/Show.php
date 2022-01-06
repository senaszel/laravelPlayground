<?php

namespace App\View\Components\Vaccines;

use App\Models\Vaccine;
use Illuminate\View\Component;

class Show extends Component
{
    public $vaccine;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vaccine)
    {
        $this->vaccine = $vaccine;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.vaccines.show');
    }
}
