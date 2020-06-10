<div class="form-group field-checkbox-ajax @error('name') has-error @enderror"
     data-url="{{ $url ?? '#' }}"
     data-method="POST"
     data-format="{{ isset($format) && $format === 'name,value' ? 'name,value' : 'name=value' }}" {{-- name,value / name=value--}}
>
    @php
        $field_name = isset($field_name) ? $field_name : '';
        $raw_name = $raw_name ?? Str::replaceLast('[]', '', $field_name);
    @endphp
    <div class="">
        <input type="hidden" name="{{ $field_name }}" value="0">
        <input class="checkbox @isset($class) {{ $class }} @endisset"
               type="checkbox"
               name="{{ $field_name }}"
               id="{{ isset($field_id) ? $field_id : $field_name }}"
               value="1"
               data-raw-name="{{ $raw_name }}"
               @if(old($field_name, $status ?? false)) checked @endif
        >
        <label for="{{ $field_name }}">{!! $label ?? '&nbsp;' !!}</label>
    </div>
    @isset($help_block) <p class="help-block small">{!! $help_block !!}</p>@endisset
    @error($raw_name) <p class="help-block" style="color:red;">{{ $message }}</p> @enderror
</div>

{{--
@include('lte::fields.field-checkbox-ajax', [
    'label' => 'Статус',
    'field_name' => 'status['.$i.']',
    'raw_name' => 'status',
    'format' => 'name|value', // 'name,value'
    'status' => 0,
    'url' => route('lte.data.status'),
])
--}}


