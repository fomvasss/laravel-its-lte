@extends('lte::layouts.app')

@section('content')

    @include('lte::layouts.inc.content-header', [
        'page_title' => trans('lte::main.Users'),
        'url_back' => session('control.users.index'),
    ])

    <section class="content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="box">
                    {!! Form::open([
                         'route' => 'control.users.store',
                         'files' => true
                    ]) !!}
                    <div class="box-header">
                        <i class="ion ion-clipboard"></i>
                        <h3 class="box-title">{{ trans('lte::main.Edit') }}</h3>
                    </div>
                    <div class="box-body">
                        @include('lte::content.users._form')
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop
