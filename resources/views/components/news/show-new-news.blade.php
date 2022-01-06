<link rel="stylesheet" href="{{ asset('css/news/news.css') }}">

<section class="formContainer">
    <div class="inner"
         style="background-color:
                            {{ \App\Helpers\RandomColor::insert($news->id) }}">

        <div class="formItem">
            <p>tytuł</p>
            <h4>{{ $title }}</h4>
        </div>

        <div class="formItem">
            <p>autor</p>
            <h4>{{ $author }}</h4>
        </div>

        <div class="formItem">
            <p>opis</p>
            <h4>{{ $desc }}</h4>
        </div>

        <div class="formItem">
            <p>treść</p>
            <h4>{{ $content }}</h4>
        </div>

        <div class="formItem">
            <form action="{{ route('home') }}" method="get">
                <button class="actionButton"
                        type="submit">
                    Powrót
                </button>
            </form>
            @can('Admin')
                <form action="{{ route('edit-news',$news) }}" method="get">
                    <button class="actionButton"
                            type="submit">
                        Edytuj
                    </button>
                </form>

                <form action="{{ route('destroy-news',$news) }}" method="POST">
                    @csrf
                    <button class="actionButton"
                            type="submit">
                        Usuń
                    </button>
                </form>
            @endcan
        </div>

    </div>
</section>
