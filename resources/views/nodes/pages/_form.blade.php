@include('lte::fields.field-checkbox', [
    'label' => 'Публиковать',
    'field_name' => 'publish',
    'status' => isset($node) ? $node->publish : 1,
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
    {!! Form::select('blade', [null => 'По умолчанию',] + ['front.pages.home' => 'Главная'], null, ['class' => 'form-control select2', 'data-minimum-results-for-search' => '-1']) !!}
    {!! $errors->first('blade', '<p class="help-block">:message</p>') !!}
</div>

@empty($node)
<div class="form-group {{ $errors->has('url_alias') ? 'has-error' : ''}}">
    {!! Form::label('url_alias', 'URL-алиас', ['class' => 'control-label']) !!}
    {!! Form::text('url_alias', isset($node) ? optional($node->urlAlias)->alias : null, ['class' => 'form-control', isset($node) ? 'readonly' : '']) !!}
    {!! $errors->first('url_alias', '<p class="help-block">:message</p>') !!}
</div>
@endempty

@include('lte::fields.field-form-buttons', [
    //'url_store_and_create' => route('admin.pages.create'),
    //'url_store_and_close' => session('admin.pages.index'),
    //'url_destroy' => isset($node) ? route('admin.pages.destroy', $node) : '',
    //'url_after_destroy' => session('admin.pages.index'),
    'url_close' => session('admin.pages.index'),
])
