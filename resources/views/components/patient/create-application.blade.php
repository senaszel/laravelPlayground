<link rel="stylesheet" href="{{ asset('css/register/register-form.css') }}">
<link rel="stylesheet" href="{{ asset('css/application/create.css') }}">

<section id="container_registerForm">
    <form method="POST" action="{{route('patient-store-application')}}">
        @csrf
        <div class="item_registerForm BannerDodajNowy">
            <button class="actionButton"
                    type="submit"
                    disabled
            >
                Wnioskuj o szczepienie
            </button>
        </div>

        <div class="item_registerForm">
            <label id="vaccineLabel" for="vaccine" class="form-label">Wnioskuje o szczepienie preparatem:</label>
            <select name="vaccine_id" id="vaccine">
                @foreach($vaccines as $vaccine)
                    <option value="{{ $vaccine->id }}">{{ $vaccine->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="item_registerForm">
            <button
                id="registerButton"
                type="submit"
            >
                Wyślij wniosek
            </button>
        </div>
    </form>
</section>
