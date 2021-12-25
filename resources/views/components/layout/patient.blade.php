@props([
'chosenItem'
])

<link rel="stylesheet"
      href="{{ asset('css/componentPatient.css') }}"
>

<div id="patientBody">
    <div id="containerPatient">

        <p id="up"> Pacjent </p>
        <p id="middle">[id: {{ $chosenItem->id }}]</p>
        <p id="down">{{ $chosenItem->firstname }} {{ $chosenItem->lastname }} [age: {{ $chosenItem->age }}]</p>

    </div>
</div>
