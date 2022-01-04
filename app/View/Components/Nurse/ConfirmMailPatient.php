<?php

namespace App\View\Components\Nurse;

use App\Models\User;
use Illuminate\View\Component;

class ConfirmMailPatient extends Component
{
    public $user;
    public $msg;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user,string $msg)
    {
        $this->user = $user;
        $this->msg = $msg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nurse.confirm-mail-patient');
    }
}
