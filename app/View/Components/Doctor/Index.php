<?php

namespace App\View\Components\Doctor;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Index extends Component
{
    public $allPatients;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->allPatients =
            Application::
                selectRaw("COUNT(date_vaccination) as HOW_MANY,date(date_vaccination) as DATE_VACCINATION")
                ->where('status', ApplicationStatus::PENDING)
                ->where('doctor_id', auth()->user()->id)
                ->groupBy(DB::raw('Date(date_vaccination)'))
                ->orderBy('date_vaccination','ASC')
                ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.doctor.index');
    }
}
