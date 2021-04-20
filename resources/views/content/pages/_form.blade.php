{{--
@include('lte::fields.field-checkbox', [
    'label' => trans('lte::main.Publish'),
    'field_name' => 'is_publish',
    'status' => isset($page) ? $page->is_publish : 1,
])
--}}

@include('lte::fields.field-select2-static', [
    'label' => trans('lte::main.Status'),
    'field_name' => 'status',
    'attributes' => ['published' => 'Publishsd', 'unpublished' => 'Unpublished'],
    'selected' => isset($page) ? $page->status : null,
    'old' => old('status')
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

@include('lte::fields.field-slug', [
    'label' => 'Slug',
    'field_name' => 'slug',
    'entity' => isset($page) ? $page : null,
    //'value' => 'page-already-slug' // optional
    'placeholder' => 'Entered slug',
])

@include('lte::fields.field-form-buttons')
