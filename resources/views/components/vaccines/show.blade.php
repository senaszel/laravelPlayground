<link rel="stylesheet" href="{{ asset('css/news/news.css') }}">

<section class="formContainer">
    <div class="inner"
         style="background-color:
                            {{ \App\Helpers\RandomColor::insert($vaccine->id) }}">

        <div class="formItem">
            <p>Nazwa preparatu</p>
            <h4>{{ $vaccine->name }}</h4>
        </div>

        <div class="formItem">
            <p>Opis</p>
            <h4>{{ $vaccine->description }}</h4>
        </div>

        <div class="formItem">
            <p>Przeciwwskazania</p>
            <h4>{{ $vaccine->contraindications }}</h4>
        </div>

        <div class="formItem">
            <form action="{{ route('vaccines-index') }}" method="get">
                <button class="actionButton"
                        type="submit">
                    Powrót
                </button>
            </form>
        </div>
    </div>
</section>
