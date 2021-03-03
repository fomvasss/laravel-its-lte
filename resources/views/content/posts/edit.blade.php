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
                    <div class="col-lg-12">
                        <h3 class="box-title"> {{ trans('lte::main.Edit') }} <strong>{{ isset($post) ? $post->name : '' }}</strong></h3>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="nav-tabs-justified">

                    <ul class="nav nav-tabs">
                        @foreach([
                            trans('lte::main.Data') => route('control.posts.edit', $post),
                            trans('lte::main.SEO') => route('control.posts.edit', [$post, 'tab' => 'seo']),
                        ] as $title => $path)
                            @if(\Request::fullUrlIs($path))
                                <li class="js-changed-tab active"><a href="#">{{ $title }}</a></li>
                            @else
                                <li><a class="js-changed-tab" href="{{ $path }}">{{ $title }}</a></li>
                            @endif
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <br>
                            @if(request('tab') == 'seo')
                                {!! Form::model(isset($post) ? $post : null, [
                                    'method' => 'POST',
                                    'route' => ['control.posts.seo.save', $post],
                                    'files' => true
                                ]) !!}
                                @include('lte::content.seo.metatags', ['entity' => $post])
                            @else
                                {!! Form::model($post ?? null, [
                                    'method' => 'PATCH',
                                    'route' => ['control.posts.update', $post],
                                    'files' => true
                                ]) !!}
                                @include('lte::content.posts._form')
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

