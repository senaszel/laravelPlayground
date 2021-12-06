@props([
'chosenItem'
])

<link rel="stylesheet"
      href="{{ asset('css/componentPatient.css') }}"
>

<div id="patientBody">
    <div id="containerPatient">

        <h1 id="up">patient</h1>
        <h2 id="middle">[id: {{ $chosenItem->id }}]</h2>
        <h2 id="down">{{ $chosenItem->firstname }} {{ $chosenItem->lastname }} [age: {{ $chosenItem->age }}]</h2>

    </div>
</div>
