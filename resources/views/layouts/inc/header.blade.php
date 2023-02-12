<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo" target="_blank">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{!! config('its-lte.logo_mini') !!}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! config('its-lte.logo') !!}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle"
           data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu pull-left">

            <ul class="nav navbar-nav">
                <li class="user user-menu" title="{{ config('app.timezone') }}: {{ now()->timezone(config('app.timezone')) }}&#013;@if(config('app.timezone_client')){{ config('app.timezone_client') }}: {{ now()->timezone(config('app.timezone_client')) }}@endif">
                    <a href="#" class="" data-toggle="">
                        <i class="fa fa-clock-o"></i>
                    </a>
                </li>
            </ul>

            @if(config('its-lte.view.header_filter_languages'))
            <ul class="nav navbar-nav filter-languages">
                <li class="dropdown messages-menu">
                    <a href="#ru" class="act">ru</a>
                </li>
                <li class="dropdown messages-menu">
                    <a href="#en">en</a>
                </li>
                <li class="dropdown messages-menu">
                    <a href="#ua">ua</a>
                </li>

                <li class="user user-menu" title="{{ trans('lte::main.Locale') }}" style="margin-left: 15px">
                    <select class="form-control js-change-url" style="margin-top: 7px">

                        @foreach(['en', 'uk', 'es'] as $locale)
                            <option value="#{{ $locale }}"
                                    @if($locale === 'uk') selected @endif>
                                {{ mb_strtoupper($locale) }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="user user-menu" title="Visit">
                    <a href="/" target="_blank" data-toggle="">
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </li>
            </ul>
            @endif

        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @if(config('its-lte.view.header_notify_menus'))
                <li class="messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="/vendor/its-lte/img/no-avatar.png" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="/vendor/its-lte/img/no-avatar.png" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Reviewers
                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <li class="notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                        not fit into the
                                        page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <li class="tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="dropdown user user-menu">
                    @auth
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="account-icon"><i class="fa fa-sign-in"></i></span>
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/lte/profile"
                                       class="btn btn-default btn-flat">{{ trans('lte::main.Profile') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#"
                                       class="btn btn-default btn-flat js-action-form"
                                       data-url="{{ route('logout') }}"
                                       data-confirm="{{ trans('lte::main.Confirm logout?') }}"
                                    >{{ trans('lte::main.Logout') }}</a>
                                </div>
                            </li>
                        </ul>
                    @endauth
                </li>
            </ul>
        </div>
    </nav>
</header>
