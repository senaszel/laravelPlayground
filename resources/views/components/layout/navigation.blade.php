<link rel="stylesheet" href="{{ asset('css/navigationComponent.css') }}">

<div id="navContainer"></div>
<nav id="navNav">
    <ul id="flex-container" class="nav">
        <img
             id="banner" src="{{ asset('banner.svg') }}" alt="banner szczepimy.sie">
        @guest
            <li class="navItem">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Aktualności</a>
            </li>
        @endguest

        @can('Patient')
            <li class="navItem">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Aktualności dla
                    Pacjentów</a>
            </li>
            <li class="navItem">
                <a class="nav-link active" aria-current="page"
                   href="{{ route('patient-applications') }}"
                >Wnioskuj o szczepienie</a>
            </li>
            <li class="navItem">
                <a class="nav-link disabled" aria-current="page" href="#">Historia szczepień</a>
            </li>
            <li class="navItem">
                <a class="nav-link disabled" aria-current="page" href="#">Moje Certyfikaty szczepienia</a>
            </li>
        @endcan

        @can('Admin')
            <li class="navItem">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Aktualności
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li class="navItem">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Widoczne dla pacjentów</a>
                        </li>
                        <li class="navItem">
                            <a class="nav-link active" aria-current="page" href="{{ route('create-news') }}">Dodaj nowy wpis</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="navItem">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Użytkownicy
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li class="navItem">
                            <a class="nav-link active" aria-current="page" href="{{ url(\App\Models\User::latestID()) }}">Wszyscy użytkownicy</a>
                        </li>
                        <li class="navItem">
                            <a class="nav-link active" aria-current="page" href="{{ route('create-user') }}">Dodaj nowego użytkownika</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan

        @can('Nurse')
            <li class="navItem">
                <a class="nav-link active" aria-current="page" href="{{ route('create-patient') }}">Zarejestruj pacjenta</a>
            </li>
            <li class="navItem">
                <a class="nav-link disabled" aria-current="page" href="#">Zaplanuj szczepienia</a>
            </li>
        @endcan

        @can('Doctor')
            <li class="navItem">
                <a class="nav-link disabled" aria-current="page" href="#">Dzisiejsze szczepienia</a>
            </li>
            <li class="navItem">
                <a class="nav-link disabled" aria-current="page" href="#">Rejestr szczepionek</a>
            </li>
            <li class="navItem">
                <a class="nav-link disabled" aria-current="page" href="#">Harmonogram pracy</a>
            </li>
        @endcan
        <li class="navItem" id="rightmost">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    @guest
                        Zacznij tutaj!
                    @endguest
                    @auth
                        {{ Auth::user()->title ?? " " }} {{ ucfirst(Auth::user()->username) ?? "anon" }}
                    @endauth
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @guest
                        <li><a class="dropdown-item" href="{{ route('createNewUser') }}">Załóż konto</a></li>
                        <li><a class="dropdown-item" href="{{ route('loginForm') }}">Zaloguj</a></li>
                    @endguest
                    @auth
                        <li><a class="dropdown-item disabled" href="#">Moje dane</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Wyloguj</a></li>
                    @endauth
                </ul>
            </div>
        </li>
    </ul>
</nav>

