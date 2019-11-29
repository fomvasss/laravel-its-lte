@extends('lte::layouts.app')

@php
    $content_header = [
        'page_title' => 'Страницы',
        'url_back' => session('pages.index'),
        'url_create' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-lg-8">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title"> Создание страницы</h3>
                </div>
            </div>
        </div>
        <div class="box-body">

            <div class="nav-tabs-justified">
                <ul class="nav nav-tabs">
                    @foreach(['Страница' => '#', 'SEO' => '#'] as $title => $url)
                        <li class="@if(Request::url() == rtrim($url, '/')) active @else disabled @endif"><a @if(Request::url() != rtrim($url, '/')) && $url != '#')href="{{ $url }}"@endif>{{ $title }}</a></li>
                    @endforeach
                    {{--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>--}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                        {!! Form::open([
                             'route' => 'lte.pages.create',
                             'files' => true
                        ]) !!}
                        @include('lte::content.pages._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@stop
