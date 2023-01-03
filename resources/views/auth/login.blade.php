@extends('lte::auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('its-lte.logo_href') }}">{!! config('its-lte.logo') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('lte::main.Login to the system') }}</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ url('login') }}" method="post">
                @csrf
                <div class="form-group @error('email') has-error @enderror has-feedback">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ trans('lte::main.Email') }}">
                    @error('email')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group @error('password') has-error @enderror has-feedback">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="{{ trans('lte::main.Password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <label>
                            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}> {{ trans('lte::main.Remember me') }}
                        </label>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('lte::main.Login') }}</button>
                    </div>
                </div>
            </form>

            @include('lte::auth.social-links')

            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}">{{ trans('lte::main.Restore password') }}</a><br>
            @endif
            @if(Route::has('register'))
                <a href="{{ route('register') }}">{{ trans('lte::main.Register') }}</a>
            @endif

        </div>
    </div>
</body>
@endsection
