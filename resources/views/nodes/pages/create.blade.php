@extends('lte::layouts.app')

@php
    $content_header = [
        'page_title' => 'Страницы',
        'url_back' => session('admin.pages.index'),
        'url_create' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="box-title"> Создание</h3>
                </div>
            </div>
        </div>
        <div class="box-body">

            <div class="nav-tabs-justified">
                <ul class="nav nav-tabs">
                    @foreach(['Данные' => '#', 'SEO' => '#'] as $title => $url)
                        <li class="@if(Request::url() == rtrim($url, '/')) active @else disabled @endif"><a @if(Request::url() != rtrim($url, '/')) && $url != '#')href="{{ $url }}"@endif>{{ $title }}</a></li>
                    @endforeach
                    {{--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>--}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <br>
                        {{-- TODO --}}
                        {!! Form::open([
                             //'route' => 'admin.pages.store',
                             'files' => true
                        ]) !!}
                        @include('lte::nodes.pages._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@stop
