<link rel="stylesheet" href="{{ asset('css/news/news-all.css') }}">

<div id="all-news-container">

        @foreach($allnews as $news)
            <div class="newsMiniature"
                 style="background-color:
                            {{ \App\Helpers\RandomColor::insert($news->id) }}">
                <a href="{{ url('',['news',$news]) }}">
                        <h5>
                            {{ $news->title }}
                        </h5>
                        <p>
                            {{ $news->description }}
                        </p>
                </a>
            </div>
        @endforeach

</div>
