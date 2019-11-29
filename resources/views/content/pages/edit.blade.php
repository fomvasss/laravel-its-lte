@extends('lte::layouts.app')

@php
    $content_header = [
        'page_title' => 'Страницы',
        'url_back' => session('pages.index'),
        'urlCreate' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="box">

        <div class="box-header">
            <div class="row">
                <div class="col-lg-12">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title"> Редактирование страницы <strong>Главная стараница</strong></h3>
                    @include('lte::inc.entity-navigation', [
                       'next' => '#',
                       'previous' => '#',
                    ])
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="nav-tabs-justified">
                <ul class="nav nav-tabs">
                    @foreach(['Страница' => '#', 'SEO' => '#'] as $title => $path)
                        <li class="@if(Request::url() == rtrim($path, '/')) active @endif"><a href="@if(Request::url() !== rtrim($path, '/')){{ $path }}@else # @endif">{{ $title }}</a></li>
                    @endforeach
                    {{--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>--}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                        @php($tab = isset($tab) ? $tab : request('tab'))
                        @if($tab == 'seo')
                            {!! Form::model(null, [
                                'method' => 'POST',
                                'route' => ['admin.pages.seo.save', $page],
                                'files' => true
                            ]) !!}
                            @include('lte::content.pages._seo', ['model' => $page])
                        @else
                            {!! Form::model(null, [
                                'method' => 'PATCH',
                                'route' => ['lte.pages.edit', 1],
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