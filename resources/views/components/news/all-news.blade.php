<link rel="stylesheet" href="{{ asset('css/news/news-all.css') }}">

<div id="all-news-container">

    @foreach($allnews as $news)
        <a href="{{ url('',['news',$news]) }}" class="abc">
            <div class="newsMiniature"
                 style="background-color:
                            {{ \App\Helpers\RandomColor::insert($news->id) }}">
                <h5>
                    {{ $news->title }}
                </h5>
                <p>
                    {{ $news->description }}
                </p>
            </div>
        </a>
    @endforeach

</div>
