<link rel="stylesheet" href="{{ asset('css/navigationComponent.css') }}">

<nav class="navbar navbar-light">
    <ul class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="img-fluid" id="banner" src="{{ asset('banner.svg') }}" alt="banner szczepimy.sie">
        </a>

        @can('Patient')
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Aktualności dla
                    Pacjentów</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('patient-applications') }}">Wnioskuj o
                    szczepienie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('patient-show-applications') }}">Historia
                    szczepień</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('patient-certificates-index') }}">Moje
                    Certyfikaty szczepienia</a>
            </li>
        @endcan

        @can('Admin')
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Aktualności
                </a>
                <ul class="nav-item dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Widoczne dla
                            pacjentów</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('create-news') }}">Dodaj nowy
                            wpis</a>
                    </li>
                </ul>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Użytkownicy
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('index-user', app\Models\User::latest()->first()->id) }}">Wszyscy
                            użytkownicy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('create-user') }}">Dodaj
                            nowego użytkownika</a>
                    </li>
                </ul>
            </div>
        @endcan

        @can('Nurse')
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('create-patient') }}">Zarejestruj
                    pacjenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('plan-vaccinations') }}">Zaplanuj
                    szczepienia</a>
            </li>
        @endcan

        @can('Doctor')
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('doctor-work-today') }}">Dzisiejsze
                    szczepienia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('vaccines-index') }}">Rejestr
                    szczepionek</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('doctor-work-schedule') }}">Harmonogram
                    pracy</a>
            </li>
        @endcan

        <div class="nav-item dropdown" id="rightmost">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-expanded="false">
                @guest
                    Zacznij tutaj!
                @endguest
                @auth
                    {{ auth()->user()->title .' ' .ucfirst(\App\Models\Personal::where('user_id', auth()->user()->id)->first()->firstname ?? ' ') }}
                    {{ ucfirst(\App\Models\Personal::where('user_id', auth()->user()->id)->first()->lastname ?? 'anon') }}
                @endauth
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @guest
                    <li><a class="dropdown-item" href="{{ route('createNewUser') }}">Załóż konto</a></li>
                    <li><a class="dropdown-item" href="{{ route('loginForm') }}">Zaloguj</a></li>
                @endguest
                @auth
                    <li><a class="dropdown-item" href="{{ route('personals') }}">Moje dane</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Wyloguj</a></li>
                @endauth
            </ul>
        </div>
    </ul>
</nav>
