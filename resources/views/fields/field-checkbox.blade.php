<div class="form-group @error('name') has-error @enderror">
    @php
        $field_name = isset($field_name) ? $field_name : '';
    @endphp
    <div class="">
        <input type="hidden" name="{{ $field_name }}" value="0">
        <input class="checkbox @isset($class) {{ $class }} @endisset"
               type="checkbox"
               name="{{ $field_name }}"
               id="{{ $field_name }}"
               value="1"
               @if(old($field_name, $status ?? false)) checked @endif
        >
        <label for="{{ $field_name }}">{!! $label ?? 'Статус' !!}</label>
    </div>
    @isset($help_block) <p class="help-block small">{!! $help_block !!}</p>@endisset
    @error(Str::replaceLast('[]', '', $field_name)) <p class="help-block" style="color:red;">{{ $error }}</p> @enderror
</div>

{{--
@include('lte::fields.field-checkbox', [
    'label' => 'Статус',
    'field_name' => 'status',
    'status' => 0,
])
--}}
