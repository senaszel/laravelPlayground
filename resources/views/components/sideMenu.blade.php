@props([
    'menuItems'
])

<ul @class('text-center p-2 bg-secondary list-unstyled')>
    @foreach($menuItems as $chosenItem)
        <li style="margin: 0 0 1rem 0;border: 2px solid black">
            <a href="{{ Route('homewithid',['id'=>$chosenItem->id]) }}">{{ $chosenItem->id . ' #id ' . $chosenItem->firstname . ' ' . $chosenItem->lastname . ' (' . $chosenItem->age . ')' }}</a>
        </li>
    @endforeach
</ul>
