<?php

namespace App\View\Components\Vaccines;

use Illuminate\View\Component;

class Index extends Component
{
    public $vaccines;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vaccines)
    {
        $this->vaccines = $vaccines;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.vaccines.index');
    }
}
