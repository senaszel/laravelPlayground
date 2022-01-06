<link rel="stylesheet" href="{{ asset('css/nurse/show-patient-data.css') }}">

<section class="formContainer">
    <div class="inner">

        <div class="formItem">
            <label for="username" class="">Imie</label>
            <p>
                {{ $personals->firstname ?? '' }}
            </p>
        </div>

        <div class="formItem">
            <label for="email" class="">Nazwisko</label>
            <p>
                {{ $personals->lastname ?? '' }}
            </p>
        </div>

        <div class="formItem">
            <label for="email" class="">Wiek</label>
            <p>
                {{ $personals->age ?? '' }}
            </p>
        </div>

        <div class="formItem">
            <label for="email" class="">Płeć</label>
            <p>
                {{ $personals->sex ?? '' }}
            </p>
        </div>

        <div class="formItem">
            <label for="email" class="">Numer telefonu</label>
            <p>
                {{ $personals->phone ?? '' }}
            </p>
        </div>

        <div class="formItem" style="margin-top: 0;">
            <label for="role" class="">Adres</label>
            <p>
                {{ $personals->adress ?? '' }}
            </p>
        </div>

{{--        <div class="formItem buttons">--}}
{{--            <form action="#" method="get">--}}
{{--                <button class="actionButton"--}}
{{--                        type="submit">--}}
{{--                    Wyślij dane mailem--}}
{{--                </button>--}}
{{--            </form>--}}
{{--            <form action="#" method="get">--}}
{{--                <button class="actionButton"--}}
{{--                        type="submit">--}}
{{--                    Drukuj--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}

    </div>
</section>
