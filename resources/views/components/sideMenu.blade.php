@props([
'menuItems'
])

<link rel="stylesheet" href="{{ asset('css/sideMenu.css') }}">

<div id="sideMenuVerticalContainer" class="container">
    <nav>
        <ul id="sideMenuVerticalBarUl">
            @foreach($menuItems as $chosenItem)
                <li>
                    <a
                        href="{{ Route('patient-id',['id'=>$chosenItem->id]) }}">
                        {{ $chosenItem->id . ' #id ' . $chosenItem->firstname . ' ' . $chosenItem->lastname . ' (' . $chosenItem->age . ')' }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
