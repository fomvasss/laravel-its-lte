<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('lte::main.2FA') }}</h3>
    </div>
        <div class="box-body">
            @if(! auth()->user()->two_factor_secret)
                {{-- Enable 2FA --}}
                <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                    @csrf
                    <button type="submit" class="btn btn-info margin">{{ trans('lte::main.Enable Two-Factor') }}</button>
                </form>
            @else
                {{-- Disable 2FA --}}
                <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info margin">{{ trans('lte::main.Disable Two-Factor') }}</button>
                </form>

                @if(session('status') == 'two-factor-authentication-enabled')
                    {{-- Show SVG QR Code, After Enabling 2FA --}}
                    <div>
                        {!! trans('lte::main.Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') !!}
                    </div>

                    <div>
                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                    </div>
                @endif

                {{-- Show 2FA Recovery Codes --}}
                <div>
                    {!! trans('lte::main.Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') !!}
                </div>

                <div>
                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                        <div>
                            <code>{{ $code }}</code>
                        </div>
                    @endforeach
                </div>

                {{-- Regenerate 2FA Recovery Codes --}}
                <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}">
                    @csrf
                    <button type="submit" class="btn btn-info margin">{{ trans('lte::main.Regenerate Recovery Codes') }}</button>
                </form>
            @endif

        </div>
    <div class="box-footer">
    </div>
</div>

