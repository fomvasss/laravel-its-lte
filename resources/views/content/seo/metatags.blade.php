<div class="row">
    <div class="col-md-6">
        @include('lte::fields.field-slug', [
            'label' => 'Slug',
            'field_name' => 'slug',
            'entity' => isset($entity) ? $entity : null,
            //'value' => 'page-already-slug' // optional
            'placeholder' => 'Entered slug',
        ])
        <div class="form-group @error('metatag.title') has-error @enderror">
            {!! Form::label('metatag[title]', '<title>', ['class' => 'control-label',]) !!}
            {!! Form::text('metatag[title]', isset($entity) && $entity->metametatag ? $entity->metametatag->title : null, ['class' => 'form-control','placeholder' => '']) !!}
            @error('metatag.title') <p class="help-block"> {{$message }} </p> @enderror
        </div>
        <div class="form-group @error('metatag.description') has-error @enderror">
            {!! Form::label('metatag[description]', '<description>', ['class' => 'control-label',]) !!}
            {!! Form::textarea('metatag[description]', isset($entity) && $entity->metametatag ? $entity->metametatag->description : null, ['class' => 'form-control','placeholder' => '', 'rows' => 3]) !!}
            @error('metatag.description') <p class="help-block"> {{$message }} </p> @enderror
        </div>
        <div class="form-group @error('metatag.keywords') has-error @enderror">
            {!! Form::label('metatag[keywords]', '<keywords>', ['class' => 'control-label',]) !!}
            {!! Form::textarea('metatag[keywords]', isset($entity) && $entity->metametatag ? $entity->metametatag->keywords : null, ['class' => 'form-control','placeholder' => '', 'rows' => 3]) !!}
            @error('metatag.keywords') <p class="help-block"> {{$message }} </p> @enderror
        </div>
        {{--
        <div class="form-group @error('metatag_text') has-error @enderror">
            {!! Form::label('metatag[h1]', 'metatag-text', ['class' => 'control-label',]) !!}
            {!! Form::textarea('metatag[h1]', isset($entity) && $entity->metametatag ? $entity->metametatag->h1 : null, ['class' => 'form-control ck-editor ck-small','placeholder' => '', 'rows' => 5]) !!}
            @error('metatag.h1') <p class="help-block"> {{$message }} </p> @enderror
        </div>
        --}}
    </div>

    <div class="col-lg-6">
        <div class="form-group @error('metatag.robots') has-error @enderror">
            {!! Form::label('metatag[robots]', '<robots>', ['class' => 'control-label',]) !!}
            {!! Form::text('metatag[robots]', isset($entity) && $entity->metametatag ? $entity->metametatag->robots : null, ['class' => 'form-control','placeholder' => 'index,follow']) !!}
            @error('metatag.robots') <p class="help-block"> {{$message }} </p> @enderror
        </div>
    {{--
       @include('lte::fields.field-select2-static', [
           'label' => 'priority',
           'field_name' => 'metatag[priority]',
           'attributes' => array_combine(config('meta-metatags.values.priority', []), config('meta-metatags.values.priority', [])),
           'selected' => isset($entity) && $entity->metametatag ? $entity->metametatag->priority : 0.5,
       ])
       @include('lte::fields.field-select2-static', [
           'label' => 'changefreq',
           'field_name' => 'metatag[changefreq]',
           'attributes' => array_combine(config('meta-metatags.values.changefreq', []), config('meta-metatags.values.changefreq', [])),
           'selected' => isset($entity) && $entity->metametatag ? $entity->metametatag->changefreq : 'daily',
       ])
       @include('lte::fields.field-image-uploaded-simple', [
           'label' => 'Изображение',
           'field_name' => 'og_image',
           'path' => isset($entity) && $entity->metametatag && $entity->metametatag->og_image ? '/'.$entity->metametatag->og_image : null,
       ])
       --}}
    </div>
</div>

@include('lte::fields.field-form-buttons')
