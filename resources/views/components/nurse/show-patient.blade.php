<link rel="stylesheet" href="{{ asset('css/nurse/show-patient-data.css') }}">

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

        <div class="formItem buttons">
            <form action="{{ route('mail-patient',$user) }}" method="get">
                <button class="actionButton"
                        type="submit">
                    Wyślij dane mailem
                </button>
            </form>
            <form action="{{ route('print-patient',$user) }}" method="get">
                <button class="actionButton"
                        type="submit">
                    Drukuj
                </button>
            </form>
        </div>

    </div>
</section>
