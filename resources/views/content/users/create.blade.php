@extends('lte::layouts.app')

@php
    $content_header = [
        'page_title' => 'Пользователи',
        'url_back' => session('users.index'),
        'url_create' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="box">
                {!! Form::open([
                     'url' => 'users.store',
                     'files' => true
                ]) !!}
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Создание пользователя</h3>
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
