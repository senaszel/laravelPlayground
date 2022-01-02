<link rel="stylesheet" href="{{ asset('css/form/form.css') }}">

<section class="formContainer">
    <form
        method="POST"
        action="{{ url()->route('store-news') }}"
    >
        @csrf

        <div class="formItem BannerDodajNowy">
            <button class="actionButton"
                    type="submit"
                    disabled
            >
                Dodaj nowy wpis
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
            ></textarea>
        </div>
        <div class="formItem">
            <button class="actionButton"
                    type="submit"
                    style="text-transform: full-width"
            >
                Dodaj
            </button>
        </div>
    </form>
</section>
