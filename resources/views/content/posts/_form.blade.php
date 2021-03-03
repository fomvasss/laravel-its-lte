<div class="row">
    <div class="col-md-6">
        @include('lte::fields.field-select2-static', [
            'label' => trans('lte::main.Status'),
            'field_name' => 'status',
            'attributes' => ['publish' => 'Publish', 'draft' => 'Draft'],
            'selected' => isset($post) ? $post->status : 'publish',
        ])

        <div class="form-group @error('name') has-error @enderror">
            {!! Form::label('name', trans('lte::main.Name'), ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
            @error('name') <p class="help-block">{{$message}}</p> @enderror
        </div>

        @include('lte::fields.field-select2-tags', [
            'label' => trans('lte::main.Tags'),
            //'attributes' => [1 => 'Новости', 2 => 'Спорт', 3 => 'Политика'],
            'data_url' => '#', //route('control.api.autocomplete.tags', ['format' => 'name']),
            'selected' => isset($post) ? $post->allTagsSelect2Array() : [],
            'field_name' => 'tags',
            'separators' => "[',',';']",
            'new_tag_label' => ' [NEW]',
            'max' => 10,
            'multiple' => 1,
            'old' => old('tags'),
            'help_text' => '* Enter tags by separating them , or ;'
        ])
    </div>
    <div class="col-md-6">
        @include('lte::fields.field-image-uploaded',[
            'label' => trans('lte::main.Image'),
            'field_name' => 'image',
            'entity' => isset($post) ? $post : null,
        ])
        @include('lte::fields.field-images-uploaded-sortable',[
             'label' => trans('lte::main.Images'),
             'field_name' => 'images',
             'entity' => isset($post) ? $post : null,
        ])
    </div>
</div>

<div class="form-group @error('teaser') has-error @enderror">
    {!! Form::label('teaser', trans('lte::main.Teaser'), ['class' => 'control-label']) !!}
    {!! Form::textarea('teaser', null, ['class' => 'form-control ck-editor ck-mini', 'rows' => 4, 'id' => 'ck1']) !!}
    @error('teaser') <p class="help-block">{{$message}}</p> @enderror
</div>
<div class="form-group @error('content') has-error @enderror">
    {!! Form::label('content', trans('lte::main.Content'), ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control ck-editor ck-full', 'rows' => 5, 'id' => 'ck2']) !!}
    @error('content') <p class="help-block">{{$message}}</p> @enderror
</div>

@include('lte::fields.field-slug', [
    'label' => 'Slug',
    'field_name' => 'slug',
    'entity' => isset($page) ? $page : null,
    //'value' => 'page-already-slug' // optional
    'placeholder' => 'Entered slug',
])

@include('lte::fields.field-form-buttons')
