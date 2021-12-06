@php
    $navItemClass = 'nav-item p-2';
    $navItemStyle = 'min-width:15%; border: 1px solid black;height:100%; background-color: lightblue;';
@endphp

<ul class="nav w-100 d-flex justify-content-between">
    <li class="{{ $navItemClass }}" style="{{ $navItemStyle }}">
        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
    </li>
    <li class="{{ $navItemClass }}" style="{{ $navItemStyle }}">
        <a class="nav-link disabled" href="#">Dwa</a>
    </li>
    <li class="{{ $navItemClass }}" style="{{ $navItemStyle }}">
        <a class="nav-link disabled" href="#">Trzy</a>
    </li>
    <li class="{{ $navItemClass }}" style="{{ $navItemStyle }}">
        <a class="nav-link" href="{{ route('register') }}">Zarejestruj</a>
    </li>
    <li class="{{ $navItemClass }}" style="{{ $navItemStyle }}">
        <a class="nav-link disabled" href="#" >Zaloguj</a>
    </li>
</ul>
