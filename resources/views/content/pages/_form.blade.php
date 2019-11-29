@include('lte::fields.field-checkbox', [
    'label' => 'Публиковать',
    'field_name' => 'publish',
    'status' => isset($page) ? $page->publish : 1,
])

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Название', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
    {!! Form::label('body', 'Контент', ['class' => 'control-label']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control ck-editor ck-full', 'rows' => 5]) !!}
    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('blade') ? 'has-error' : ''}}">
    {!! Form::label('blade', 'Шаблон', ['class' => 'control-label']) !!}
    {!! Form::select('blade', [
        null => 'По умолчанию',
        'front.pages.home' => 'Домашняя страница',
        'front.pages.policy' => 'Политика',
        'front.pages.payment' => 'Оплата и доставка',
        'front.pages.buy' => 'Где купить',
        //'front.pages.contacts' => 'Контакты',
        ], null, ['class' => 'form-control select2', 'data-minimum-results-for-search' => '-1']) !!}
    {!! $errors->first('blade', '<p class="help-block">:message</p>') !!}
</div>

@empty($page)
<div class="form-group {{ $errors->has('url_alias') ? 'has-error' : ''}}">
    {!! Form::label('url_alias', 'URL-алиас', ['class' => 'control-label']) !!}
    {!! Form::text('url_alias', isset($page) ? optional($page->urlAlias)->alias : null, ['class' => 'form-control', isset($page) ? 'readonly' : '']) !!}
    {!! $errors->first('url_alias', '<p class="help-block">:message</p>') !!}
</div>
@endempty

@include('lte::fields.field-form-buttons', [
    'url_store_and_create' => '#',
    'url_store_and_close' => '#',
    'url_destroy' => '#',
    'url_after_destroy' => '#',
    'url_close' => '#',
])
