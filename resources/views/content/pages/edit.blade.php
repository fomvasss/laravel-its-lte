@extends('lte::layouts.app')

@section('content')

    @include('lte::layouts.inc.content-header', [
        'page_title' => trans('lte::main.Pages'),
        'url_back' => session('admin.pages.index'),
    ])

    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="box-title"> {{ trans('lte::main.Edit') }} <strong>{{ isset($page) ? $page->name : '' }}</strong></h3>
                        @include('lte::parts.entity-navigation', [
                           'next' => '#', //$page->previous() ? route('admin.pages.edit', $page->previous()) : '',
                           'current' => '#', //route('pages.show', $page),
                           'previous' => '#', //$page->next() ? route('admin.pages.edit', $page->next()) : '',
                        ])
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="nav-tabs-justified">

                    <ul class="nav nav-tabs">
                        @foreach([
                            trans('lte::main.Data') => '#', //route('admin.pages.edit', $page)
                            trans('lte::main.SEO') => '#', //route('admin.pages.seo', $page)
                        ] as $title => $path)
                            <li class="@if(Request::url() == rtrim($path, '/')) active @endif"><a href="@if(Request::url() !== rtrim($path, '/')){{ $path }}@else # @endif">{{ $title }}</a></li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <br>
                            @php($tab = isset($tab) ? $tab : request('tab'))
                            @if($tab == 'seo')
                                {!! Form::model(isset($page) ? $page : null, [
                                    'method' => 'POST',
                                    //'route' => ['admin.pages.seo.save', $page],
                                    'files' => true
                                ]) !!}
                                @include('lte::content.pages._seo', ['model' => $page])
                            @else
                                {!! Form::model($page ?? null, [
                                    'method' => 'PATCH',
                                    //'route' => ['admin.pages.update', $page],
                                    'files' => true
                                ]) !!}
                                @include('lte::content.pages._form')
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop