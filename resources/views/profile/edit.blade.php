@extends('lte::layouts.app')

@section('content')

    @include('lte::layouts.inc.content-header', [
       'page_title' => trans('lte::main.User Profile'),
       'small_page_title' => trans('lte::main.Edit'),
       'url_back' => '',
       'url_create' => ''
   ])

    <section class="content">
        <div class="row">
            @auth
            <div class="col-lg-8 col-md-offset-2">
                @if(config('its-lte.use_laravel_fortify'))
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
                        @include('lte::profile.update-profile-information-form')
                    @endif

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        @include('lte::profile.update-password-form')
                    @endif

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
                        @include('lte::profile.two-factor-authentication-form')
                    @endif
                @else
                    @include('lte::profile.simple-form')
                @endif
            </div>
            @else
                <h2 class="margin">{{ trans('lte::main.You are guest! Need to login') }}</h2>
            @endauth
        </div>
    </section>
@stop
