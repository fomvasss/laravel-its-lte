<div class="form-group @error('name') has-error @enderror">
    @php
        $field_name = isset($field_name) ? $field_name : '';
        $unchecked_value = isset($unchecked_value) ? $unchecked_value : 0;
        $checked_value = isset($checked_value) ? $checked_value : 1;
    @endphp
    <div class="">
        <input type="hidden" name="{{ $field_name }}" value="{{ $unchecked_value }}">
        <input class="checkbox @isset($class) {{ $class }} @endisset"
               type="checkbox"
               name="{{ $field_name }}"
               id="{{ $field_name }}"
               value="{{ $checked_value }}"
               @if(old($field_name, $status ?? false)) checked @endif
        >
        @isset($label)<label for="{{ $field_name }}">{!! $label !!}</label>@endisset
    </div>
    @isset($help_block) <p class="help-block small">{!! $help_block !!}</p>@endisset
    @error(Str::replaceLast('[]', '', $field_name)) <p class="help-block" style="color:red;">{{ $message }}</p> @enderror
</div>

{{--
@include('lte::fields.field-checkbox', [
    'label' => 'Status',
    'field_name' => 'status',
    'status' => 0,
    'unchecked_value' => 'unpublished',
    'checked_value' => 'published',
])
--}}
