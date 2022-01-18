<link rel="stylesheet" href="{{ asset('css/register/register-form.css') }}">

<section id="container_registerForm">
    <form method="POST" action="{{route('store-patient')}}">
        <div class="item_registerForm BannerDodajNowy">
            <button class="actionButton"
                    type="submit"
                    disabled
            >
                Dodaj pacjenta
            </button>
        </div>

        @csrf
        <div class="item_registerForm">
            <label for="username" class="form-label">nazwa konta</label>
            <input
                type="text"
                class="form-control"
                name="username"
                id="username"
                placeholder="podaj nazwę konta pacjenta"
                required
            >
            @error('username')
            <p class="errorMSG">{{ $message }}</p>
            @enderror
        </div>
        <div class="item_registerForm">
            <label for="email" class="form-label">adres email</label>
            <input
                type="email"
                class="form-control"
                name="email"
                id="email"
                placeholder="podaj adres email pacjenta"
                required
            >
            @error('email')
            <p class="errorMSG">{{ $message }}</p>
            @enderror
        </div>

        <div class="item_registerForm">
            <button
                id="registerButton"
                type="submit"
            >
                Dodaj
            </button>
        </div>
    </form>
</section>
