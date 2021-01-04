@extends('lte::auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('its-lte.logo_href') }}">{!! config('its-lte.logo') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">2FA</p>
            @if ($errors->any())
                <div>
                    <div>{{ trans('lte::main.Whoops! Something went wrong') }}</div>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/two-factor-challenge') }}" method="post">
                @csrf
                {{--
                   Do not show both of these fields, together. It's recommended
                   that you only show one field at a time and use some logic
                   to toggle the visibility of each field
               --}}

                <div>
                    {!! trans('lte::main.Please confirm access to your account by entering the authentication code provided by your authenticator application.') !!}
                </div>

                <div class="form-group @error('code') has-error @enderror has-feedback">
                    <input id="code" type="text" class="form-control" name="code" autofocus autocomplete="one-time-code">
                    @error('code')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                {{-- ** OR ** --}}

                <div>
                   {!! trans('lte::main.Please confirm access to your account by entering one of your emergency recovery codes.') !!}
                </div>

                <div class="form-group @error('recovery_code') has-error @enderror has-feedback">
                    <input id="recovery_code" type="text" class="form-control" name="recovery_code" autocomplete="one-time-code" placeholder="{{ trans('lte::main.Recovery Code') }}">
                    @error('recovery_code')
                    <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('lte::main.Send') }}</button>
                    </div>
                </div>
            </form>

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
