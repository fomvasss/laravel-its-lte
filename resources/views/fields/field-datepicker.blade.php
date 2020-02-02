@php
    $field_name = isset($field_name) ? $field_name : '';
    $value = isset($value) ? $value : '';
@endphp
<div class="form-group {{ $errors->has($field_name) ? 'has-error' : ''}}">
    <label for="{{ $field_name }}">{!! $label ?? 'Дата' !!}</label>
    <input type="text" class="form-control field-datepicker" name="{{ $field_name }}" value="{{ $value }}" autocomplete="off"/>
    {!! $errors->first(Str::replaceLast('[]', '', $field_name), '<p class="help-block" style="color:red;">:message</p>') !!}
</div>

{{--
@include('lte::fields.field-datetimepicker', [
    'label' => 'Дата созадния',
    'field_name' => 'created_at',
    'value' => \Carbon\Carbon::now(),
])
--}}
