@php
    $field_name = $field_name ?? '';
    $value = isset($value)
    ? $value
    : (isset($entity) ? $entity->{$field_name} : '');
@endphp


<div class="form-group @error($field_name) has-error @enderror">
    @isset($label)
        <label>{!! $label !!}</label>
    @endisset
    <div class="input-group">
        @empty($value)
            <span class="input-group-addon">
                <i class="fa fa-link"></i>
            </span>
        @else
            <span class="input-group-addon">
                <a href="{{ $value }}" target="_blank" ><i class="fa fa-link"></i></a>
            </span>
        @endif
        <input type="url"
               name="{{ $field_name }}"
               value="{{ old($field_name, $value) }}"
               @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
               @isset($required) required @endisset
               @isset($readonly) readonly @endisset
               class="form-control @isset($class) {{ $class }} @endisset"
        >
    </div>
    @error($field_name) <p class="help-block">{{$message}}</p> @enderror
</div>

{{--

@include('lte::fields.field-url', [
    'label' => 'URL',
    'field_name' => 'url',
    'entity' => isset($post) ? $post : null,
    //'value' => isset($post) ? $post->url : '',
    'placeholder' => '',
])
--}}

