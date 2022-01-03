<link rel="stylesheet" href="{{ asset('css/user/show.css') }}">

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
                    <form action="{{ route('edit-user',$user) }}" method="get">
                        <button class="actionButton"
                                type="submit">
                            Edytuj
                        </button>
                    </form>

                    <form action="{{ route('destroy-user',$user) }}" method="POST">
                        @csrf
                        <button class="actionButton"
                                type="submit">
                            Usuń
                        </button>
                    </form>
            </div>

        </div>
    </section>

