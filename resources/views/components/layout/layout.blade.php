@props([
'patients',
'chosenpatient'
])

<html lang="pl">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous"
    >
    <link rel="stylesheet"
          href="{{ asset('css/layout.css') }}"
    >
</head>

<body>

<div class="container">
    <nav>
        <x-layout.navigation></x-layout.navigation>
    </nav>

    <aside>
        <x-sideMenu
            :menuItems="$patients"
        ></x-sideMenu>
    </aside>

    <main>
        @if(isset($chosenpatient) && is_object($chosenpatient))
            <x-layout.patient
                :chosenItem="$chosenpatient"
            ></x-layout.patient>
        @endif

        {{ $slot ?? '' }}
    </main>
</div>

</body>
</html>
