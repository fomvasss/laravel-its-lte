@include('lte::layouts.inc.begin')
<div class="wrapper">
    @include('lte::layouts.inc.header')
    @include('lte::layouts.inc.aside')
    <div class="content-wrapper">

        @include('lte::layouts.inc.content-messages')
        @include('lte::parts.alerts')

        @yield('content')
    </div>
    @include('lte::layouts.inc.footer')
    <div class="control-sidebar-bg"></div>
</div>
@include('lte::layouts.inc.end')

@stack('modals')
