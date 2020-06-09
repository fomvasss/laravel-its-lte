@extends('lte::layouts.app')

@section('content')

    @include('lte::layouts.inc.content-header', [
       'page_title' => 'Аккаунт',
       'small_page_title' => 'Admin Bob',
       'url_back' => '',
       'url_create' => ''
   ])

    <section class="content">
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Данные аккаунта</h3>
                    </div>
                    <div class="box-body">
                        {!! Form::model($user ?? null, [
                            'method' => 'POST',
                            'url' => '/admin/account',
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
                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                {!! Form::label('phone', 'Телефон', ['class' => 'control-label',]) !!}
                                {!! Form::text('phone', null, ['class' => 'form-control','placeholder' => 'example@app.com']) !!}
                                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
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

                            @include('lte::fields.field-form-buttons')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop