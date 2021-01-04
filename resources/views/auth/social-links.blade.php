@if($providers = ['github', 'google', 'facebook'])
    <div class="social-auth-links text-center">
    <p>- {{ trans('lte::main.OR') }} -</p>
    @if(in_array('github', $providers))
        <a href="#{{--{{ route('socialite.oauth', 'github') }}--}}"
           class="btn btn-block btn-social btn-github btn-flat"
        ><i class="fa fa-github"></i> {{ trans('lte::main.Sign in using') }} GitHub
        </a>
    @endif
    @if(in_array('google', $providers))
    <a href="#{{--{{ route('socialite.oauth', 'google') }}--}}"
       class="btn btn-block btn-social btn-google btn-flat"
    ><i class="fa fa-google-plus"></i> {{ trans('lte::main.Sign in using') }} Google+
    </a>
    @endif
    @if(in_array('facebook', $providers))
    <a href="#{{--{{ route('socialite.oauth', 'facebook') }}--}}"
       class="btn btn-block btn-social btn-facebook btn-flat"
    ><i class="fa fa-facebook"></i> {{ trans('lte::main.Sign in using') }} Facebook
    </a>
    @endif
    </div>
@endif