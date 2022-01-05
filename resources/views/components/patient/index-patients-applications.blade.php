<link rel="stylesheet" href="{{ asset('css/sideMenu.css') }}">

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

    <section id="main">
        <x-patient.create-application> </x-patient.create-application>
    </section>
</aside>
