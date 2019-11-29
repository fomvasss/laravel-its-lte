@php
    $field_name = isset($field_name) ? $field_name : '';
    $value = isset($value) ? $value : '';
@endphp
<div class="form-group {{ $errors->has($field_name) ? 'has-error' : ''}}">
    <label for="{{ $field_name }}">{!! $label ?? 'Цвет' !!}</label>
    <div class="input-group">
        <span class="input-group-addon">
            @if($value)
                <i class="fa fa-circle" style="color: {{ $value }}"></i>
            @else
                <i class="fa fa-eyedropper"></i>
            @endif
        </span>
        <input type="text" class="form-control field-colorpicker" name="{{ $field_name }}" value="{{ $value }}" autocomplete="off">
    </div>
    {!! $errors->first(Str::replaceLast('[]', '', $field_name), '<p class="help-block" style="color:red;">:message</p>') !!}
</div>

{{--
@include('lte::fields.field-colorpicker', [
    'label' => 'Цвет',
    'field_name' => 'color',
    'value' => '#35e61a',
])
--}}
