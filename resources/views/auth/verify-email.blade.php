@extends('lte::auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('its-lte.logo_href') }}">{!! config('its-lte.logo') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Подтверждение</p>
            <p>Проверьте свой адрес электронной почты</p>

            @if (session('status') == 'verification-link-sent')
                <div>
                    На Email, который вы указали при регистрации, была отправлена новая ссылка для подтверждения.
                </div>
            @endif

            Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.
            Если вы не получили письмо, нажмите
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit">
                    здесь,
                </button>
            </form>
            чтобы запросить новую ссылку

        </div>
    </div>
</body>
@endsection
