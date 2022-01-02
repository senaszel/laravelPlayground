<link rel="stylesheet" href="{{ asset('css/form/form.css') }}">

<section class="formContainer">
    <form
        style="background-color:
        {{ \App\Helpers\RandomColor::insert($news->id) }};"
        method="POST"
        action="{{ url()->route('update-news',$news) }}"
    >
        @csrf

        <div class="formItem BannerEdycja">
            <button class="actionButton"
                    type="submit"
                    disabled
            >
                Edycja
            </button>
        </div>

        <div class="formItem">
            <label for="title" class="form-label">tytuł</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"
                placeholder="wprowadź tytuł"
                value="{{ $news->title }}"
                required
            >
        </div>
        <div class="formItem">
            <label for="author" class="form-label">autor</label>
            <input
                type="text"
                class="form-control"
                name="author"
                id="author"
                placeholder="nieobowiązkowe"
                value="{{ $news->author }}"
            >
        </div>
        <div class="formItem">
            <label for="description" class="form-label">opis</label>
            <input
                type="text"
                class="form-control"
                name="description"
                id="description"
                placeholder="wprowadź opis"
                value="{{ $news->description }}"
                maxlength="150"
                required
            >
        </div>
        <div class="formItem">
            <label for="content" class="form-label">pełna treść</label>
            <textarea
                rows="5"
                cols="80"
                class="form-control"
                name="content"
                id="content"
                placeholder="wprowadź pełną treść"
                required
            >
                {{ $news->content }}
            </textarea>
        </div>

        <div class="formItem gridIt">
            <a class="nonbuttonPowrot" href="{{ route('show-news',$news) }}">
                Powrót
            </a>
            <button class="actionButton buttonEdycja"
                    type="submit">
                Zapisz zmiany
            </button>
        </div>
    </form>
</section>
