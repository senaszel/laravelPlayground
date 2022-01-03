<?php

namespace App\View\Components\User;

use App\Models\User;
use Illuminate\View\Component;

class EditUser extends Component
{
    public $allUsers;
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->allUsers = User::all()->sortByDesc('updated_at');
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.edit-user');
    }
}
