<div class="row">
    <div class="col-md-6">
        @include('lte::fields.field-slug', [
            'label' => 'Slug',
            'field_name' => 'slug',
            'entity' => isset($entity) ? $entity : null,
            //'value' => 'page-already-slug' // optional
            'placeholder' => 'Entered slug',
        ])

        <div class="form-group @error('seo.title') has-error @enderror">
            {!! Form::label('seo[title]', '<title>', ['class' => 'control-label',]) !!}
            {!! Form::text('seo[title]', isset($entity) && $entity->seo ? $entity->seo->title : null, ['class' => 'form-control','placeholder' => '']) !!}
            @error('seo.title') <p class="help-block"> {{$message }} </p> @enderror
        </div>
        <div class="form-group @error('seo.description') has-error @enderror">
            {!! Form::label('seo[description]', '<description>', ['class' => 'control-label',]) !!}
            {!! Form::textarea('seo[description]', isset($entity) && $entity->seo ? $entity->seo->description : null, ['class' => 'form-control','placeholder' => '', 'rows' => 3]) !!}
            @error('seo.description') <p class="help-block"> {{$message }} </p> @enderror
        </div>
        <div class="form-group @error('seo.keywords') has-error @enderror">
            {!! Form::label('seo[keywords]', '<keywords>', ['class' => 'control-label',]) !!}
            {!! Form::textarea('seo[keywords]', isset($entity) && $entity->seo ? $entity->seo->keywords : null, ['class' => 'form-control','placeholder' => '', 'rows' => 3]) !!}
            @error('seo.keywords') <p class="help-block"> {{$message }} </p> @enderror
        </div>
        {{--
        <div class="form-group @error('seo_text') has-error @enderror">
            {!! Form::label('seo[h1]', 'seo-text', ['class' => 'control-label',]) !!}
            {!! Form::textarea('seo[h1]', isset($entity) && $entity->seo ? $entity->seo->h1 : null, ['class' => 'form-control ck-editor ck-small','placeholder' => '', 'rows' => 5]) !!}
            @error('seo.h1') <p class="help-block"> {{$message }} </p> @enderror
        </div>
        --}}
    </div>

    <div class="col-lg-6">
        <div class="form-group @error('seo.robots') has-error @enderror">
            {!! Form::label('seo[robots]', '<robots>', ['class' => 'control-label',]) !!}
            {!! Form::text('seo[robots]', isset($entity) && $entity->seo ? $entity->seo->robots : null, ['class' => 'form-control','placeholder' => 'index,follow']) !!}
            @error('seo.robots') <p class="help-block"> {{$message }} </p> @enderror
        </div>
        {{--
           @include('lte::fields.field-select2-static', [
               'label' => 'priority',
               'field_name' => 'seo[priority]',
               'attributes' => array_combine(config('meta-seos.values.priority', []), config('meta-seos.values.priority', [])),
               'selected' => isset($entity) && $entity->seo ? $entity->seo->priority : 0.5,
           ])
           @include('lte::fields.field-select2-static', [
               'label' => 'changefreq',
               'field_name' => 'seo[changefreq]',
               'attributes' => array_combine(config('meta-seos.values.changefreq', []), config('meta-seos.values.changefreq', [])),
               'selected' => isset($entity) && $entity->seo ? $entity->seo->changefreq : 'daily',
           ])
           @include('lte::fields.field-image-uploaded-simple', [
               'label' => 'Изображение',
               'field_name' => 'og_image',
               'path' => isset($entity) && $entity->seo && $entity->seo->og_image ? '/'.$entity->seo->og_image : null,
           ])
           --}}
    </div>
</div>

@include('lte::fields.field-form-buttons')
