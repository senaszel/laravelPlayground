@props([
'menuItems',
'user'
])
<link rel="stylesheet" href="{{ asset('css/sideMenu.css') }}">

<aside>

    <div id="sideMenuVerticalContainer" class="container">
            <ul id="sideMenuVerticalBarUl">
                @foreach($menuItems as $chosenItem)
                    <li>
                        <a
                            href="{{ Route('show-user',['user'=>$chosenItem->id]) }}">
                            {{ $chosenItem->id . ' #id ' . $chosenItem->title . ' ' . $chosenItem->username }}
                        </a>
                    </li>
                @endforeach
            </ul>
    </div>

<section id="main">
    <x-user.show-user :user="$user"> </x-user.show-user>
</section>
</aside>
