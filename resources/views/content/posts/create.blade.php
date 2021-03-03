@extends('lte::layouts.app')

@section('content')

    @include('lte::layouts.inc.content-header', [
        'page_title' => trans('lte::main.Articles'),
        'url_back' => session('control.posts.index'),
    ])

    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="box-title"> {{ trans('lte::main.Create') }}</h3>
                    </div>
                </div>
            </div>
            <div class="box-body">

                <div class="nav-tabs-justified">

                    <ul class="nav nav-tabs">
                        @foreach([trans('lte::main.Data') => '#', trans('lte::main.SEO') => '#'] as $title => $url)
                            @if($loop->first)
                                <li class="active"><a href="#">{{ $title }}</a></li>
                            @else
                                <li class="disabled"><a href="#">{{ $title }}</a></li>
                            @endif
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <br>
                            {!! Form::open([
                                 'route' => 'control.posts.store',
                                 'files' => true
                            ]) !!}
                                @include('lte::content.posts._form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop
