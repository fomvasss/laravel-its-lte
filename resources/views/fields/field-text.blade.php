@php
    $field_name = $field_name ?? '';
    $value = isset($value) ? $value : '';
@endphp

<div class="form-group @error($field_name) has-error @enderror">
    @isset($label)
    <label for="{{ $field_name }}" class="control-label">{{ $label }}</label>
    @endisset
    @if(isset($type) && $type === 'textarea')
        <textarea class="form-control @isset($class) {{$class}} @endisset"
                  rows="{{ isset($rows) ? $rows : 3 }}"
                  name="{{ $field_name }}"
                  placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
                  id="@isset($field_id) {{ $field_name }} @else {{ $field_name }} @endisset"
                  @isset($readonly) readonly @endisset
        >{{ old($field_name, $value) }}</textarea>
    @else
        <input class="form-control @isset($class) {{$class}} @endisset"
               placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
               type="{{ isset($type) ? $type : 'text' }}"
               name="{{ $field_name }}"
               value="{{ old($field_name, $value) }}"
               id="@isset($field_id) {{ $field_name }} @else {{ $field_name }} @endisset"
               @isset($readonly) readonly @endisset
               @isset($step) step="{{$step}}" @endisset
               @isset($min) min="{{$min}}" @endisset
               @isset($max) max="{{$max}}" @endisset
               autocomplete="off"
        >
    @endif
    @error($field_name) <p class="help-block">{{ $message }}</p> @enderror
    @isset($help_text)
        <p class="help-block small">{!! $help_text !!}</p>
    @endisset
</div>

{{--
@include('lte::fields.field-text', [
    'label' => 'Title',
    'field_name' => 'name',
    'value' => isset($name) ? $name : '',
    'type' => 'text',
    'field_id' => 'name',
    'placeholder' => 'Enter title',
])
--}}