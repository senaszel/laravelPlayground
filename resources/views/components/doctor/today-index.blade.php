<link rel="stylesheet" href="{{ asset('css/sideMenu.css') }}">
<link rel="stylesheet" href="{{ asset('css/application/show.css') }}">

<aside>
    <div id="sideMenuVerticalContainer" class="container">
        <label class="previousApplications"
        >
            Dzisiejsze szczepienia do wykonania:
        </label>

        @if(iterator_count($todaysAppointments) > 0)
            <label class="appointmentsLeft"
            >
                Pozostało: {{ $AppointmentsLeft }} szczepień do wykonania
            </label>
        @endif

        <ul id="sideMenuVerticalBarUl">
            @if(iterator_count($todaysAppointments) > 0)
                @foreach($todaysAppointments as $appointment)
                    <li>
                        <a
                            @if($appointment->status == \App\Enums\ApplicationStatus::DONE)
                            style="color: green"
                            @elseif($appointment->status == \App\Enums\ApplicationStatus::SKIPPED)
                            style="color: darkred"
                            @elseif($appointment->status == \App\Enums\ApplicationStatus::PENDING)
                            style="color: black"
                            @endif
                            href="{{ route('doctor-work-today',$appointment->id) }}">
                            {{ $applicantFullName($appointment->patient_id) }} ( {{ $vaccName($appointment->vaccine_id) }} )
                        </a>
                    </li>
                @endforeach
            @else
                <li>
                    <h4>Brak pacjentów zapisanych dzisiaj na szczepienia.</h4>
                </li>
            @endif
        </ul>
    </div>

    <section id="main">
        <div class="inner">
            <label class="formItem vaccineBanner">
                Wniosek o szczepienie
            </label>

            <div class="formItem">
                <label class="">Złożony: </label>
                <h4>
                    @if($chosenAppointment != null)
                        {{ date_format($chosenAppointment->created_at,'d-m-Y') }} r.
                    @endif
                </h4>
            </div>

            <div class="formItem">
                <label class="">Przez: </label>
                <h4>
                    @if($chosenAppointment != null)
                        {{ $applicantFullName($chosenAppointment->patient_id) }}
                    @endif
                </h4>
            </div>

            <div class="formItem">
                <label class="">
                    Wybrany preparat:
                </label>
                <h4>
                    @if($chosenAppointment != null)
                        {{ $vaccName($chosenAppointment->vaccine_id) }}
                    @endif
                </h4>
            </div>

            <div class="formItem">
                <label class="" for="doctor">Szczepienie przeprowadzi</label>
                @if($chosenAppointment != null)
                    <h4>
                        {{ \App\Models\Personal::where('user_id',auth()->user()->id)->first()->firstname }}
                        {{ \App\Models\Personal::where('user_id',auth()->user()->id)->first()->lastname }}
                    </h4>
                @else
                    <h4></h4>
                @endif
            </div>

            <div class="formItem">
                <label for="role" class="">Data szczepienia</label>
                @if($chosenAppointment != null)
                    <h4>
                        {{ date_format(now(),'d-m-Y') }} r.
                    </h4>
                @else
                    <h4></h4>
                @endif
            </div>

            @if($chosenAppointment != null && $chosenAppointment->status == \App\Enums\ApplicationStatus::PENDING)
                <div class="formItem">
                    <h4 style="background-color: rgb(201, 187, 170);"></h4>
                    <div class="outer_greenButton">
                        <form
                            action="{{ route('doctor-confirm-vaccination',['application'=>$chosenAppointment]) }}"
                            method="post">
                            @csrf
                            <button type="submit" class="greenButton">
                                Potwierdzam wykonanie szczepienia
                            </button>
                        </form>

                        <form
                            action="{{ route('doctor-deny-vaccination',['application'=>$chosenAppointment,'status'=>\App\Enums\ApplicationStatus::SKIPPED]) }}"
                            method="post">
                            @csrf
                            <button type="submit" class="redbutton">
                                Nie wykonano szczepienia
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </section>
</aside>

