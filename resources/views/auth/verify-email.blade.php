@extends('lte::auth.app')

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ config('its-lte.logo_href') }}">{!! config('its-lte.logo') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('lte::main.Confirmation') }}</p>
            <p>{{ trans('lte::main.Check your email address') }}</p>

            @if (session('status') == 'verification-link-sent')
                <div>
                    {{ trans('lte::main.A new confirmation link has been sent to the Email that you specified during registration.') }}
                </div>
            @endif
            {!! trans('lte::main.Please check your email for the confirmation link before proceeding. If you have not received the email, click') !!}
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit">
                    {{ trans('lte::main.here') }},
                </button>
            </form>
            {!! trans('lte::main.to request a new link') !!}
        </div>
    </div>
</body>
@endsection
