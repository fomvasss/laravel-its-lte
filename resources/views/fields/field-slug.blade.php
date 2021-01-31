@php
    $field_name = $field_name ?? '';
    $value = isset($value)
        ? $value
        : (isset($entity) && $entity ? $entity->{$field_name} : '');
@endphp

@empty($entity)
    <div class="form-group @error($field_name) has-error @enderror">
        @isset($label)
        <label>{!! $label !!}</label>
        @endisset
        <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" disabled checked>
            </span>
            <input type="text" name="slug" value="{{ old($field_name, $value) }}" class="form-control">
            @error($field_name) <p class="help-block">{{$message}}</p> @enderror
        </div>
    </div>
@else
    <div class="form-group js-verification-slug-field @error($field_name) has-error @enderror">
        @isset($label)
            <label>{!! $label !!}</label>
        @endisset
        <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="{{ $field_name . '_change' }}" value="1" class="js-slug-field-change" @if(old($field_name . '_change')) checked @endif>
            </span>
            <input type="text" name="{{ $field_name }}" value="{{ old($field_name, $value) }}" class="form-control js-slug-field-input" readonly>
            @error($field_name) <p class="help-block">{{$message}}</p> @enderror
        </div>
    </div>
@endempty

{{--
@include('lte::fields.field-slug', [
    'label' => 'Slug',
    'field_name' => 'slug',
    'entity' => $page,
    //'value' => 'page-already-slug' // optional
    'placeholder' => 'Entered slug',
])
--}}
