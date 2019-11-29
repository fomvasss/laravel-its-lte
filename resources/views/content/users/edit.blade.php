@extends('lte::layouts.app')

@php
    $content_header = [
        'page_title' => 'Пользователи',
        'url_back' => session('users.index'),
        'urlCreate' => ''
    ]
@endphp

@section('content')
<section class="content">
    <div class="box">
        {!! Form::model(null, [
            'method' => 'PATCH',
            'url' => '#',
            'files' => true
        ]) !!}
        <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Редактирование пользователя <strong>{{ isset($user) ? $user->name : '' }}</strong></h3>
        </div>
        <div class="box-body">
                @include('lte::content.users._form')
        </div>
        {!! Form::close() !!}
    </div>
</section>
@stop