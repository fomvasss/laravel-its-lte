@extends('lte::layouts.app')

@php
    $content_header = [
        'page_title' => 'Страницы',
        'url_back' => session('admin.pages.index'),
        'urlCreate' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="box">

        <div class="box-header">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="box-title"> Редактирование <strong>{{ isset($node) ? $node->name : '' }}</strong></h3>
                    {{-- TODO --}}
                    @include('lte::inc.entity-navigation', [
                       'next' => '#', //$node->previous() ? route('admin.pages.edit', $node->previous()) : '',
                       'current' => '#', //route('pages.show', $node),
                       'previous' => '#', //$node->next() ? route('admin.pages.edit', $node->next()) : '',
                    ])
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="nav-tabs-justified">
                <ul class="nav nav-tabs">
                    {{-- TODO --}}
                    @foreach([
                        'Данные' => '#', //route('admin.pages.edit', $node)
                        'SEO' => '#', //route('admin.pages.seo', $node)
                    ] as $title => $path)
                        <li class="@if(Request::url() == rtrim($path, '/')) active @endif"><a href="@if(Request::url() !== rtrim($path, '/')){{ $path }}@else # @endif">{{ $title }}</a></li>
                    @endforeach
                    {{--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>--}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                        @php($tab = isset($tab) ? $tab : request('tab'))
                        @if($tab == 'seo')
                            {{-- TODO --}}
                            {!! Form::model(isset($node) ? $node : null, [
                                'method' => 'POST',
                                //'route' => ['admin.pages.seo.save', $node],
                                'files' => true
                            ]) !!}
                            @include('lte::nodes.pages._seo', ['model' => $node])
                        @else
                            {{-- TODO --}}
                            {!! Form::model($node ?? null, [
                                'method' => 'PATCH',
                                //'route' => ['admin.pages.update', $node],
                                'files' => true
                            ]) !!}
                            @include('lte::nodes.pages._form')
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@stop