<link rel="stylesheet" href="{{ asset('css/nurse/show-patient-data.css') }}">
<link rel="stylesheet" href="{{ asset('css/register/register-form.css') }}">

<section class="formContainer">
    <div class="inner">

        <div class="formItem">
            <label for="username" class="">nazwa konta:</label>
            <p>
                {{ $user->username }}
            </p>
        </div>
        <div class="formItem">
            <label for="email" class="">adres email:</label>
            <p>
                {{ $user->email   }}
            </p>
        </div>

        <div class="formItem">
            <label for="role" class="">rola w systemie:</label>
            <p>
                {{ $user->role }}
            </p>
        </div>

        {{--        <div class="formItem">--}}
        <div class="item_registerForm BannerDodajNowy">
            <button class="actionButton"
                    type="submit"
                    disabled
            >
                {{ $msg }}
            </button>
        </div>
    </div>
</section>
