@php
    $field_name = isset($field_name) ? $field_name : '';
    $value = isset($value) ? $value : '';
@endphp
<div class="form-group @error($field_name) has-error @enderror">
    @isset($label)<label for="{{ $field_name }}">{!! $label ?? 'Дата и время' !!}</label><br>@endisset
    <input type="text" class="form-control field-datetimepicker @isset($class) {{ $class }} @endisset" name="{{ $field_name }}" value="{{ $value }}" autocomplete="off"/>
    @error(Str::replaceLast('[]', '', $field_name)) <p class="help-block" style="color:red;">{{ $message }}</p> @enderror
</div>

{{--
@include('lte::fields.field-datetimepicker', [
    'label' => 'Datetime',
    'field_name' => 'created_at',
    'value' => \Carbon\Carbon::now(),
])
--}}
