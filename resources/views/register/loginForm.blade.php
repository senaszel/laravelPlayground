<x-layout>

    <x-layout.navigation></x-layout.navigation>

    <link rel="stylesheet" href="{{ asset('css/register/register-form.css') }}">
    <section id="container_registerForm">
        <form
            method="POST"
            action="{{ url()->route('login') }}"
        >
            @csrf
            <div class="item_registerForm">
                <label for="email" class="form-label">adres e-mail</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="podaj email np. nazwa@szczepimy.sie"
                    value="{{ old('email') }}"
                    required
                >
            </div>
            <div class="item_registerForm">
                <label for="password" class="form-label">hasło</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    placeholder="twoje hasło"
                    required
                >
            </div>
            <div class="item_registerForm">
                <button id="registerButton"
                        type="submit">
                    Zaloguj
                </button>
            </div>
        </form>
    </section>

</x-layout>
