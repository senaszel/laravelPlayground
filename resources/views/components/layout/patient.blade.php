@props([
'chosenItem'
])

<h1>patient {{ $chosenItem->id }}</h1>

<h2>{{ $chosenItem->firstname }} {{ $chosenItem->lastname }}</h2>
