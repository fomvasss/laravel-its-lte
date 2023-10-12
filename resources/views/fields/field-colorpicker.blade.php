@php
    $field_name = isset($field_name) ? $field_name : '';
    $value = isset($value) ? $value : '';
@endphp
<div class="form-group @error($field_name) has-error @enderror">
    <label for="{{ $field_name }}">{!! $label ?? 'Цвет' !!}</label>
    <div class="input-group">
        <span class="input-group-addon">
            @if($value)
                <i class="fa fa-circle" style="color: {{ $value }}"></i>
            @else
                <i class="fa fa-eyedropper"></i>
            @endif
        </span>
        <input type="text"
            class="form-control field-colorpicker @isset($class) {{ $class }} @endisset" 
            name="{{ $field_name }}" 
            value="{{ $value }}" 
            @isset($data_name) data-name="{{$data_name}}" @endisset
            autocomplete="off"
        >
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
