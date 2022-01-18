<link rel="stylesheet" href="{{ asset('css/sideMenu.css') }}">

<aside>

    <div id="sideMenuVerticalContainer" class="container">

        <label class="previousApplications"
        >
            Użytkownicy systemu:
        </label>

        <ul id="sideMenuVerticalBarUl">
            @foreach($allUsers as $oneUser)
                <li>
                    <a
                        href="{{ Route('show-user',['user'=>$oneUser->id]) }}">
                        {{ $oneUser->title . ' ' .
\App\Models\Personal::where('user_id',$oneUser->id)->value('firstname') . ' ' .
\App\Models\Personal::where('user_id',$oneUser->id)->value('lastname') }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <section id="main">
        <x-user.show-user :user="$user"> </x-user.show-user>
    </section>
</aside>
