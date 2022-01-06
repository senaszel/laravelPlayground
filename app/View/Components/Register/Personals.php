<?php

namespace App\View\Components\Register;

use Illuminate\View\Component;

class Personals extends Component
{
    public $personals;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($personals)
    {
        $this->personals = $personals;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.register.personals');
    }
}
