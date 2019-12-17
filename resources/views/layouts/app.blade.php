@include('lte::layouts.inc.begin')
<div class="wrapper">
    @include('lte::layouts.inc.header')
    @include('lte::layouts.inc.aside')
    <div class="content-wrapper">

        @include('lte::layouts.inc.content-messages')
        
        @include('lte::layouts.inc.content-header', array_merge([
            'page_title' => config('its-lte.title'),
            'small_page_title' => '',
            'url_back' => '',
            'url_create' => ''
        ], $content_header ?? []))

{{--
        <div class="col-md-12">
            <br> <!-- TODO -->
            @include('lte::inc.notifications')
        </div>
--}}

        @yield('content')
    </div>
    @include('lte::layouts.inc.footer')
    <div class="control-sidebar-bg"></div>
</div>
@include('lte::layouts.inc.end')
@include('lte::inc.toastr')
@stack('modals')
