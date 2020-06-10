<aside class="main-sidebar">
    <section class="sidebar">
{{--        {!! \App\Models\Menu\Menu::renderByName('admin_menu', 'lte.layouts.inc.sidebar-menu.menu') !!}--}}
        @includeWhen(config('its-lte.aside_menu.static', false), 'lte::layouts.inc.sidebar-menu.static-example')
        @includeWhen(config('its-lte.aside_menu.lte', false), 'lte::layouts.inc.sidebar-menu.lte-example')
    </section>
</aside>