<?php

namespace App\View\Components\Doctor;

use App\Enums\ApplicationStatus;
use App\Helpers\VaccName;
use App\Models\Application;
use App\Models\Personal;
use Illuminate\View\Component;

class TodayIndex extends Component
{
    public $todaysAppointments;
    public $chosenAppointment;
    public $AppointmentsLeft;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($chosenAppointment = null)
    {
        $this->todaysAppointments =
            Application::where('doctor_id', auth()->user()->id)
                ->where('date_vaccination', '=', today())
                ->get();
        $this->chosenAppointment = $chosenAppointment;
        $this->AppointmentsLeft =
            Application::where('doctor_id', auth()->user()->id)
                ->where('status', ApplicationStatus::PENDING)
                ->where('date_vaccination', '=', today())
                ->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.doctor.today-index');
    }

    public function applicantFullName($id)
    {
        return Personal::where('user_id', $id)->value('firstname') . ' ' . Personal::where('user_id', $id)->value('lastname');
    }

    public function vaccName($id)
    {
        return VaccName::getById($id);
    }

    public function doctorFullName($id)
    {
        return 'doktor ' . Personal::where('user_id', $id)->value('firstname') . ' ' . Personal::where('user_id', $id)->value('lastname');
    }
}
