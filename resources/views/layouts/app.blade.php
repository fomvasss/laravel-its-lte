@include('lte::layouts.inc.begin')
<div class="wrapper">
    @include('lte::layouts.inc.header')
    @include('lte::layouts.inc.aside')
    <div class="content-wrapper">

        @include('lte::layouts.inc.content-messages')
        @includeWhen(in_array('bootstrap', config('its-lte.alerts', [])), 'lte::parts.alerts.bootstrap')

        @yield('content')
    </div>
    @include('lte::layouts.inc.footer')
    <div class="control-sidebar-bg"></div>
</div>
@include('lte::layouts.inc.end')

@includeWhen(in_array('toastr', config('its-lte.alerts', [])), 'lte::parts.alerts.toastr')
@includeWhen(in_array('sweetalert', config('its-lte.alerts', [])), 'lte::parts.alerts.sweetalert')
@stack('modals')
