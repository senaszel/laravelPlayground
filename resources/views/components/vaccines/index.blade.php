<link rel="stylesheet" href="{{ asset('css/news/news-all.css') }}">

<div id="all-news-container">

    @foreach($vaccines as $vaccine)
        <a href="{{ route('vaccines-show-vaccine',$vaccine) }}" class="abc">
            <div class="newsMiniature"
                 style="background-color:
                            {{ \App\Helpers\RandomColor::insert($vaccine->id) }}">
                <h5>
                    {{ $vaccine->name }}
                </h5>
                <p>
                    {{ $vaccine->description }}
                </p>
            </div>
        </a>
    @endforeach

</div>
