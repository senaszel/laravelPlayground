    <link rel="stylesheet" href="{{ asset('css/register/register-form.css') }}">

    <section id="container_registerForm">
        <form method="POST" action="{{route('store-user')}}">
            <div class="item_registerForm BannerDodajNowy">
                <button class="actionButton"
                        type="submit"
                        disabled
                >
                    Dodaj nowego użytkownika
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
                    placeholder="podaj nazwę konta"
                    value="{{ old('username') }}"
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
                    placeholder="podaj email użytkownika w domenie np. nazwa@szczepimy.sie"
                    value="{{ old('email')   }}"
                    required
                >
                @error('email')
                <p class="errorMSG">{{ $message }}</p>
                @enderror
            </div>
            <div class="item_registerForm">
                <label for="password" class="form-label">hasło</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    placeholder="podaj hasło"
                    required
                >
                @error('password')
                <p class="errorMSG">{{ $message }}</p>
                @enderror
            </div>

            <div class="item_registerForm">
                <label for="role" class="form-label">rola w systemie</label>
                <input
                    type="text"
                    class="form-control"
                    name="role"
                    id="role"
                    placeholder="ADMIN / NURSE / DOCTOR / PATIENT"
                    required
                >
                @error('role')
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


