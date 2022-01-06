<?php

namespace App\View\Components\Nurse;

use App\Enums\ApplicationStatus;
use App\Enums\UserRole;
use App\Helpers\VaccName;
use App\Models\Application;
use App\Models\Personal;
use App\Models\User;
use Illuminate\View\Component;

class PlanVaccinations extends Component
{
    public $issuedApplications;
    public $application;
    public $doctors;
    public $isApp;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application = $application ?? Application::where('status', ApplicationStatus::ISSUED)->first();
        $this->issuedApplications = Application::where('status', ApplicationStatus::ISSUED)->get();
        $this->doctors = User::where('role', UserRole::DOCTOR)->get();
        $this->isApp = true;
        if (count($application->attributesToArray()) == 0) $this->isApp = false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nurse.plan-vaccinations');
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
