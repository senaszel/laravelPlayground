<link rel="stylesheet" href="{{ asset('css/register/register-form.css') }}">
<link rel="stylesheet" href="{{ asset('css/sideMenu.css') }}">

<aside>

    <div id="sideMenuVerticalContainer" class="container">
        <ul id="sideMenuVerticalBarUl">
            @foreach($allUsers as $oneUser)
                <li>
                    <a
                        href="{{ Route('show-user',['user'=>$oneUser->id]) }}">
                        {{ $oneUser->title . ' ' . $oneUser->username }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <section id="main">
        <section id="container_registerForm">
            <form method="POST" action="{{route('update-user',['user'=>$user])}}">
                <div class="item_registerForm BannerDodajNowy">
                    <button class="actionButton"
                            type="submit"
                            disabled
                    >
                        Edycja danych użytkownika:
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
                        value="{{ $user->username }}"
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
                        value="{{ $user->email   }}"
                        required
                    >
                    @error('email')
                    <p class="errorMSG">{{ $message }}</p>
                    @enderror
                </div>
                <div class="item_registerForm">
                    <label for="password" class="form-label">hasło</label>
                    <p for="role" class="form-label" style="font-size: small">Czy zmienić hasło?</p>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        id="password"
                        placeholder="zmienić hasło?"
                        value="****************"
                        required
                    >
                    @error('password')
                    <p class="errorMSG">{{ $message }}</p>
                    @enderror
                </div>

                <div class="item_registerForm">
                    <label for="role" class="form-label">rola w systemie</label>
                    <p for="role" class="form-label" style="font-size: small">Czy zmienić rolę?</p>
                    <select name="role" id="role" style="font-size: 2rem;">
                        <option value="{{$user->role}}">{{ $user->role }}</option>
                        @foreach(\App\Enums\UserRole::TYPES as $role)
                            @if($role != $user->role)
                                <option value="{{ $role }}"
                                        style="font-size: 2rem;">
                                    {{ $role }}
                                </option>
                            @endif
                        @endforeach
                    </select>


                    @error('role')
                    <p class="errorMSG">{{ $message }}</p>
                    @enderror
                </div>

                <div class="item_registerForm">
                    <button
                        id="registerButton"
                        type="submit"
                    >
                        Zapisz zmiany
                    </button>
                </div>
            </form>
        </section>
    </section>

</aside>
