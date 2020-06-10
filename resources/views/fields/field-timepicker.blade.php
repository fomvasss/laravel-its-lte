@php
    $field_name = isset($field_name) ? $field_name : '';
    $value = isset($value) ? $value : '';
@endphp
<div class="form-group @error($field_name) has-error @enderror">
    <label for="{{ $field_name }}">{!! $label ?? 'Время' !!}</label><br>
    <input type="text" class="form-control field-timepicker @isset($class) {{ $class }} @endisset" name="{{ $field_name }}" value="{{ $value }}" autocomplete="off"/>
    @error(Str::replaceLast('[]', '', $field_name)) <p class="help-block" style="color:red;">{{ $message }}</p> @enderror
</div>

{{--
@include('lte::fields.field-timepicker', [
    'label' => 'Время созадния',
    'field_name' => 'created_at',
    'value' => \Carbon\Carbon::now(),
])
--}}
