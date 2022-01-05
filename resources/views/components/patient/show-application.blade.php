<link rel="stylesheet" href="{{ asset('css/sideMenu.css') }}">
<link rel="stylesheet" href="{{ asset('css/application/show.css') }}">

<aside>

    <div id="sideMenuVerticalContainer" class="container">

        <label for="sideMenuVerticalBarUl"
               class="previousApplications"
        >
            Uprzednie wnioski:
        </label>
        <ul id="sideMenuVerticalBarUl">
            @if (!empty($applications))
                @foreach($applications as $chosenItem)
                    @if($chosenItem->status == \App\Enums\ApplicationStatus::ISSUED)
                        <li>
                            <a href="{{ Route('patient-show-application',['application'=>$chosenItem->id]) }}"
                               style="color: #ffff2f;"
                            >
                                Wniosek o szczepienie, złożony {{ date_format($chosenItem->created_at,'d-m-Y')}} r.
                            </a>
                        </li>
                    @elseif($chosenItem->status == \App\Enums\ApplicationStatus::PENDING)
                        <li>
                            <a href="{{ Route('patient-show-application',['application'=>$chosenItem->id]) }}"
                               style="color: blue;"
                            >
                                Wniosek o szczepienie zaakceptowany {{ date_format($chosenItem->created_at,'d-m-Y')}} r.
                            </a>
                        </li>
                    @elseif($chosenItem->status == \App\Enums\ApplicationStatus::DONE)
                        <li>
                            <a href="{{ Route('patient-show-application',['application'=>$chosenItem->id]) }}"
                               style="color:green;"
                            >
                                Wniosek odbytego szczepienia {{ date_format(date_create($chosenItem->date_vaccination),'d-m-Y')}} r.
                            </a>
                        </li>
                    @elseif($chosenItem->status == \App\Enums\ApplicationStatus::SKIPPED)
                        <li>
                            <a href="{{ Route('patient-show-application',$chosenItem->id) }}"
                               style="color:red;"
                            >
                                Wniosek o szczepienie, na który się nie stawiło dnia {{ date_format(date_create($chosenItem->date_vaccination),'d-m-Y')}} r.
                            </a>
                        </li>
                    @endif
                @endforeach
            @else
                <h1>Nie złożyłeś jeszcze wniosku o szczepienie</h1>
            @endif
        </ul>
    </div>

    <section class="main formContainer">
        <div class="inner">

            <label class="formItem vaccineBanner">
                Wniosek o szczepienie
            </label>

            <div class="formItem">
                <label class="">Status wniosku</label>
                <p>
                    {{ \App\Helpers\StatusForPatientsMatcher::cast($application->status) }}
                </p>
            </div>

            <div class="formItem">
                <label class="">
                    @if($application->status == \App\Enums\ApplicationStatus::DONE)
                        Podany preparat
                    @else
                        Wybrany preparat
                    @endif
                </label>
                <p>
                    {{ $vaccName($application->vaccine_id) }}
                </p>
            </div>

            <div class="formItem">
                <label class="">Szczepienie przeprowadzi</label>
                <p>
                    @if($application->doctor_id != null)
                        {{ \App\Models\User::where('id',$application->doctor_id)->get('title')->first()->title }}
                        {{ \App\Models\User::where('id',$application->doctor_id)->get('username')->first()->username }}
                    @else
                        obecny lekarz
                    @endif
                </p>
            </div>

            <div class="formItem">
                <label for="role" class="">Data szczepienia</label>
                <p>
                    {{ $vaccine->date_vaccine ?? 'niewyznaczona' }}
                </p>
            </div>

            @if(
                    $application->status == \App\Enums\ApplicationStatus::ISSUED
                  or
                    $application->status == \App\Enums\ApplicationStatus::PENDING)

                <div class="formItem hideit">
                    <a></a>
                    <form action="{{ route('patient-destroy-application',$application->id) }}"
                          method="post"
                          class="resignOfAppointmentBtn">
                        @csrf
                        <button type="submit">
                            Zrezygnuj ze szczepienia
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </section>
</aside>
