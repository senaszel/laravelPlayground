<link rel="stylesheet" href="{{ asset('css/sideMenu.css') }}">
<link rel="stylesheet" href="{{ asset('css/application/show.css') }}">

<aside>
    <div id="sideMenuVerticalContainer" class="container">
        <label for="sideMenuVerticalBarUl"
               class="previousApplications"
        >
            Złożone wnioski o szczepienia:
        </label>
        <ul id="sideMenuVerticalBarUl">
            @if(iterator_count($issuedApplications) > 0)
                @foreach($issuedApplications as $issuedApp)
                    <li>
                        <a
                            href="{{ route('plan-vaccinations',$issuedApp->id) }}">
                            Wniosek złożony {{ date_format($issuedApp->created_at,'d-m-Y')}}r.
                            przez {{ $applicantFullName($issuedApp->patient_id) }}
                        </a>
                    </li>
                @endforeach
            @else
                <li>
                    <h4>Aktualnie brak wniosków o szczepienia do rozplanowania :(</h4>
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
                    @if($isApp)
                        {{ date_format($application->created_at,'d-m-Y') }}r.
                    @endif
                </h4>
            </div>

            <div class="formItem">
                <label class="">Przez: </label>
                <h4>
                    @if($isApp)
                        {{ $applicantFullName($application->patient_id) }}
                    @endif
                </h4>
            </div>

            <div class="formItem">
                <label class="">
                    Wybrany preparat:
                </label>
                <h4>
                    @if($isApp)
                        {{ $vaccName($application->vaccine_id) }}
                    @endif
                </h4>
            </div>

            <form
                @if($isApp)
                action="{{ route('update-vaccination',['application'=>$application]) }}"
                @endif
                method="post">
                @csrf
                <div class="formItem">
                    <label class="" for="doctor_id">Szczepienie przeprowadzi</label>
                    <select @unless($isApp)class="Disabled" @endunless name="doctor_id" id="doctor_id" required>
                        <option
                            value="null"
                            @unless($isApp)
                            disabled
                            @endunless
                        >wybierz
                        </option>
                        @if($isApp)
                            @foreach($doctors as $doctor)
                                <option
                                    value="{{ $doctor->id }}">{{ $doctorFullName($doctor->id) }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="formItem">
                    <label for="date_vaccination" class="">Data szczepienia</label>
                    <input
                        type="date"
                        name="date_vaccination"
                        required
                        @unless($isApp)
                        disabled
                        @endunless
                    >
                </div>

                <div class="formItem hideit downloadCert">
                    <button
                        type="submit"
                        class="downloadCertA"
                        @unless($isApp)
                        disabled
                        @endunless
                    >
                        Zaplanuj szczepienie
                    </button>
                </div>
            </form>
            @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        </div>
    </section>
</aside>

