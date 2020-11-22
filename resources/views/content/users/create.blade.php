@extends('lte::layouts.app')

@section('content')

    @include('lte::layouts.inc.content-header', [
        'page_title' => 'Пользователи',
        'url_back' => session('admin.users.index'),
    ])

    <section class="content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="box">
                    {!! Form::open([
                         'route' => 'admin.users.store',
                         'files' => true
                    ]) !!}
                    <div class="box-header">
                        <i class="ion ion-clipboard"></i>
                        <h3 class="box-title">Создание </h3>
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
