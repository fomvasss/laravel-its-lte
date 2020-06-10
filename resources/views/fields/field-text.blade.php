@php
    $field_name = $field_name ?? '';
    $value = isset($value) ? $value : '';
@endphp

<div class="form-group @error($field_name) has-error @enderror">
    @isset($label)
    <label for="{{ $field_name }}" class="control-label">{{ $label }}</label>
    @endisset
    <input class="form-control"
           placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
           type="{{ isset($type) ? $type : 'text' }}"
           name="{{ $field_name }}"
           value="{{ old($field_name, $value) }}"
           id="@isset($field_id) {{ $field_name }} @else {{ $field_name }} @endisset"
           autocomplete="off"
    >
    @error($field_name) <p class="help-block">{{ $message }}</p> @enderror
</div>

{{--
@include('lte.fields.field-text', [
    'label' => 'Название',
    'field_name' => 'name',
    'value' => isset($name) ? $name : '',
    'type' => 'text',
    'field_id' => 'name',
    'placeholder' => 'Введите ваше имя',
])
--}}