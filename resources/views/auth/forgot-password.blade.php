@extends('lte::auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('its-lte.logo_href') }}">{!! config('its-lte.logo') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Восстановление пароля</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="form-group @error('email') has-error @enderror has-feedback">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                    @error('email')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>


                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Отправить</button>
                    </div>
                </div>
            </form>

            @if (Route::has('login'))
                <a href="{{ route('login') }}">Войти в систему</a><br>
            @endif
            @if(Route::has('register'))
                <a href="{{ route('register') }}">Зарегистрироваться</a>
            @endif

        </div>
    </div>
</body>
@endsection
