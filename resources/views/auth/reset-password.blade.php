@extends('lte::auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('its-lte.logo_href') }}">{!! config('its-lte.logo') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('lte::main.Password recovery') }}</p>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group @error('email') has-error @enderror has-feedback">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="email" placeholder="{{ trans('lte::main.Email') }}">
                    @error('email')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group @error('password') has-error @enderror has-feedback">
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="{{ trans('lte::main.Password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group @error('password_confirmation') has-error @enderror has-feedback">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required autocomplete="new-password" placeholder="{{ trans('lte::main.Password confirmation') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @error('password_confirmation')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-xs-6">
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('lte::main.Restore') }}</button>
                    </div>
                </div>
            </form>

            @if(Route::has('register'))
                <a href="{{ route('register') }}" class="text-center">{{ trans('lte::main.Register') }}</a>
            @endif

        </div>
    </div>
</body>
@endsection
