<link rel="stylesheet" href="{{ asset('css/navigationComponent.css') }}">

<div id="navContainer"></div>
<nav id="navNav">
    <ul class="nav w-100 d-flex justify-content-between">
        @can(env('ROLE_ADMIN'))
            <li class="navItem">
                <a class="nav-link active" aria-current="page" href="{{ route('patient-all') }}">Rejestr Pacjentów</a>
            </li>
        @endcan
        <li class="navItem">
            <a class="nav-link" href="{{ route('home') }}">home</a>
        </li>
        <li class="navItem">
            <a class="nav-link disabled" href="#">wolne</a>
        </li>
        <li class="navItem">
            <a class="nav-link disabled" href="#">wolne</a>
        </li>
        <li class="navItem">
            <a class="nav-link disabled" href="#">wolne</a>
        </li>
        <li class="navItem">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    @guest
                        Welcome, Anon!
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
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Wyloguj</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>

