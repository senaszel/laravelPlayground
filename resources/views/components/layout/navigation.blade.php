<link rel="stylesheet" href="{{ asset('css/navigationComponent.css') }}">

<div id="navContainer"></div>
<nav id="navNav">
    <ul class="nav w-100 d-flex justify-content-between">
        <li class="navItem">
            <a class="nav-link active" aria-current="page" href="{{ route('patient-all') }}">Rejestr Pacjentów</a>
        </li>
        <li class="navItem">
            <a class="nav-link disabled" href="#">Dwa</a>
        </li>
        <li class="navItem">
            <a class="nav-link" href="{{ route('home') }}">home</a>
        </li>
        <li class="navItem">
            <a class="nav-link disabled" href="#">Zarejestruj</a>
        </li>
        <li class="navItem">
            <a class="nav-link disabled" href="#">Zaloguj</a>
        </li>
    </ul>
</nav>
