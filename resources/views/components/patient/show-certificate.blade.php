<link rel="stylesheet" href="{{ asset('css/sideMenu.css') }}">
<link rel="stylesheet" href="{{ asset('css/application/show.css') }}">

<aside>

    <div id="sideMenuVerticalContainer" class="container">

        <label for="sideMenuVerticalBarUl"
               class="previousApplications"
        >
            Dostępne certyfikaty szczepienia:
        </label>
        <ul id="sideMenuVerticalBarUl">
            @if (!empty($applications))
                @foreach($applications as $chosenItem)
                    @if($chosenItem->status == \App\Enums\ApplicationStatus::DONE)
                        <li>
                            <a href="{{ Route('patient-show-certificate',['application'=>$chosenItem->id]) }}"
                               style="color:green;"
                            >
                                Szczepienie {{ $vaccName($chosenItem->vaccine_id) }}
                                odbyte {{ date_format(date_create($chosenItem->date_vaccination),'d-m-Y')}}
                                r.
                            </a>
                        </li>
                    @endif
                @endforeach
            @else
                <h1>Nie możesz jeszcze otrzymać certyfikatu szczepienia.</h1>
            @endif
        </ul>
    </div>

    <section class="main formContainer">
        <div class="inner">

            <label class="formItem vaccineBanner">
                Certyfikat
            </label>

            <div class="formItem">
                <label class="">Status wniosku</label>
                <p>
                    @if($application != null)
                        {{ \App\Helpers\StatusForPatientsMatcher::cast($application->status) }}
                    @endif
                </p>
            </div>

            <div class="formItem">
                <label class="">
                    @if($application != null && $application->status == \App\Enums\ApplicationStatus::DONE)
                        Podany preparat
                    @else
                        Wybrany preparat
                    @endif
                </label>
                <p>
                    @if($application != null)
                        {{ $vaccName($application->vaccine_id) }}
                    @endif
                </p>
            </div>

            <div class="formItem">
                <label class="">Szczepienie przeprowadził</label>
                <p>
                    @if($application != null)
                        @if($application->doctor_id != null)
                            {{ \App\Models\User::where('id',$application->doctor_id)->get('title')->first()->title }}
                            {{ \App\Models\User::where('id',$application->doctor_id)->get('username')->first()->username }}
                        @else
                            obecny lekarz
                        @endif
                    @endif
                </p>
            </div>

            <div class="formItem">
                <label for="">Data szczepienia</label>
                <p>
                    @if($application != null)
                        {{ date_format(date_create($application->date_vaccination),'d-m-Y') }} r.
                    @endif
                </p>
            </div>

            <div class="formItem downloadCert">
                <a
                    @if($application != null)
                    href="#"
                    @endif
                > pobierz certyfikat</a>
            </div>

        </div>
    </section>
</aside>
