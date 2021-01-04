@include('lte::fields.field-checkbox', [
    'label' => trans('lte::main.Publish'),
    'field_name' => 'is_publish',
    'status' => isset($page) ? $page->is_publish : 1,
])

<div class="form-group @error('name') has-error @enderror">
    {!! Form::label('name', trans('lte::main.title'), ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    @error('name') <p class="help-block">{{$message}}</p> @enderror
</div>

<div class="form-group @error('body') has-error @enderror">
    {!! Form::label('body', trans('lte::main.content'), ['class' => 'control-label']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control ck-editor ck-full', 'rows' => 5]) !!}
    @error('body') <p class="help-block">{{$message}}</p> @enderror
</div>

<div class="form-group @error('blade') has-error @enderror">
    {!! Form::label('blade', trans('lte::main.template'), ['class' => 'control-label']) !!}
    {!! Form::select('blade', [null => trans('lte::main.Default'),] + ['front.pages.home' => 'Home'], null, ['class' => 'form-control select2', 'data-minimum-results-for-search' => '-1']) !!}
    @error('blade') <p class="help-block">{{$message}}</p> @enderror
</div>

@empty($page)
<div class="form-group @error('url_alias') has-error @enderror">
    {!! Form::label('url_alias', trans('lte::main.URL-alias'), ['class' => 'control-label']) !!}
    {!! Form::text('url_alias', isset($page) ? optional($page->urlAlias)->alias : null, ['class' => 'form-control', isset($page) ? 'readonly' : '']) !!}
    @error('url_alias') <p class="help-block">{{$message}}</p> @enderror
</div>
@endempty

@include('lte::fields.field-form-buttons')
