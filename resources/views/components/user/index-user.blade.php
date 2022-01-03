<link rel="stylesheet" href="{{ asset('css/sideMenu.css') }}">

<aside>

    <div id="sideMenuVerticalContainer" class="container">
        <ul id="sideMenuVerticalBarUl">
            @foreach($allUsers as $oneUser)
                <li>
                    <a
                        href="{{ Route('show-user',['user'=>$oneUser->id]) }}">
                        {{ $oneUser->title . ' ' . $oneUser->username }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <section id="main">
        <x-user.show-user :user="$user"> </x-user.show-user>
    </section>
</aside>
