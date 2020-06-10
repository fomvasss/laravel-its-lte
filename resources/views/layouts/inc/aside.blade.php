<aside class="main-sidebar">
    <section class="sidebar">
        @auth
            @if(config('its-lte.view.aside_user_info')))
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/vendor/its-lte/img/no-avatar.png" class="img-circle">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
            @endif
        @endauth

        @if(config('its-lte.view.aside_search')))
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
        @endif

{{--        {!! \App\Models\Menu\Menu::renderByName('admin_menu', 'lte.layouts.inc.sidebar-menu.menu') !!}--}}
        @includeWhen(config('its-lte.aside_menu.static', false), 'lte::layouts.inc.sidebar-menu.static-example')
        @includeWhen(config('its-lte.aside_menu.lte', false), 'lte::layouts.inc.sidebar-menu.lte-example')
    </section>
</aside>