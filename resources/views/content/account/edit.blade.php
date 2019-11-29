@extends('lte::layouts.app')

@php
    $content_header = [
        'page_title' => 'Аккаунт',
    ]
@endphp

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Данные аккаунта</h3>
                    </div>
                    <div class="box-body">
                        {!! Form::model(null, [
                            'method' => 'POST',
                            'route' => 'lte.account.edit',
                            'files' => true
                        ]) !!}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                {!! Form::label('name', 'Имя', ['class' => 'control-label',]) !!}
                                {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Bill']) !!}
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                {!! Form::label('email', 'Email', ['class' => 'control-label',]) !!}
                                {!! Form::text('email', null, ['class' => 'form-control','placeholder' => 'example@app.com']) !!}
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                {!! Form::label('password', 'Пароль', ['class' => 'control-label',]) !!}
                                {!! Form::password('password',  ['class' => 'form-control',]) !!}
                                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                                {!! Form::label('password_confirmation', 'Подтверждение пароля', ['class' => 'control-label',]) !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control',]) !!}
                                {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                            </div>

                        @include('lte::fields.field-form-buttons', [
                            'url_store_and_continue' => '#'
                        ])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop