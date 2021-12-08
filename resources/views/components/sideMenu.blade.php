@props([
'menuItems'
])

<div class="container">
    <nav>
        <ul class="text-center p-2 bg-secondary list-unstyled m-0">
            @foreach($menuItems as $chosenItem)
                <li style="margin: 0 0 1rem 0;border: 2px solid black">
                    <a
                        class="pt-3 pb-3"
                        href="{{ Route('patient-id',['id'=>$chosenItem->id]) }}">
                        {{ $chosenItem->id . ' #id ' . $chosenItem->firstname . ' ' . $chosenItem->lastname . ' (' . $chosenItem->age . ')' }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
