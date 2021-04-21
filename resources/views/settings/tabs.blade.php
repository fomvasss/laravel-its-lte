@extends('lte::layouts.app')

@section('content')
    @include('lte::layouts.inc.content-header', [
        'page_title' => trans('lte::main.Settings'),
    ])

    <section class="content">
        <div class="nav-tabs-custom">
            {{-- TABS NAV --}}
            <ul class="nav nav-tabs">
                @foreach([
                    'tab1' => 'Tab 1',
                    'tab2' => 'Tab 2',
                ] as $tab => $title)
                <li class="@if(Request::is("*$tab*")) active @endif">
                    <a href="{{ route('lte.settings.tabs', $tab) }}" aria-expanded="true">{{ $title }}</a>
                </li>
                @endforeach

                <li class="dropdown pull-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        Commands <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Clear cache</a></li>
                    </ul>
                </li>
            </ul>

            {{-- TAB CONTENT --}}
            <div class="tab-content {{--bg-gray--}}">
                <div class="tab-pane active">
                    @includeWhen(Route::input('tab'), "lte::settings.tabs.".Route::input('tab'))
                </div>
            </div>
        </div>
    </section>
@endsection
