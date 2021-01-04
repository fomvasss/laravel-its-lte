@extends('lte::auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('its-lte.logo_href') }}">{!! config('its-lte.logo') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('lte::main.Registration') }}</p>
            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="form-group @error('name') has-error @enderror has-feedback">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  required autocomplete="name" autofocus placeholder="{{ trans('lte::main.Name') }}">
                    @error('name')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group @error('email') has-error @enderror has-feedback">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ trans('lte::main.Email') }}">
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
                    <div class="col-xs-7">
                        <label>
                            <input type="hidden" name="accept" value="0">
                            <input type="checkbox" name="accept" {{ old('accept') ? 'checked' : '' }}
                                value="1"> {{ trans('lte::main.I agree with the') }} <a href="#">{{ trans('lte::main.policy') }}</a>
                        </label>
                    </div>
                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('lte::main.Registration') }}</button>
                    </div>
                </div>
            </form>

            @include('lte::auth.social-links')

            @if (Route::has('login'))
                <a href="{{ route('login') }}">{{ trans('lte::main.Sign in') }}</a><br>
            @endif
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">{{ trans('lte::main.Restore password') }}</a>
            @endif

        </div>
    </div>
</body>
@endsection
