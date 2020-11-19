@extends('lte::auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('its-lte.logo_href') }}">{!! config('its-lte.logo') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Подтверждение пароля</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('password.confirm') }}" method="post">
                @csrf
                <div class="form-group @error('password') has-error @enderror has-feedback">
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Пароль">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                    <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-xs-6">
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Подтвердить</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</body>
@endsection
