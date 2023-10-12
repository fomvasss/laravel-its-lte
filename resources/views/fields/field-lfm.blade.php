@php
    $field_name = $field_name ?? '';
    $value = isset($value) ? $value : '';
@endphp

<div class="form-group @error($field_name) has-error @enderror">
    <div class="form-group f-wrap"
         @isset($is_image) data-is-image="1" @endif
         @isset($lfm_category) data-lfm-category="{{$lfm_category}}" @endisset
    >
        @isset($label)
            <label for="{{ $field_name }}" class="control-label">{{ $label }}</label>
        @endisset
        <div class="input-group input-group-sm f-wrap-item">
            <input
                name="{{ $field_name }}"
                value="{{ old($field_name, $value) }}"
                type="text"
                class="form-control js-lfm-input @isset($class) {{$class}} @endisset"
                id="@isset($field_id) {{ $field_name }} @else {{ $field_name }} @endisset"
                @isset($readonly) readonly @endisset
                @isset($data_name) data-name="{{$data_name}}" @endisset
                autocomplete="off"
                placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
            >
            <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-flat f-lfm-btn">Browse</button>
            </span>
        </div>
        <div class="preview-block">
            @if($value)
            @empty($is_image)
                <a href="{{ $value }}" target="_blank">
                    {{ Str::substr($value, -20) }}
                </a>
            @else
                <a href="{{ $value }}" target="_blank" class="js-popup-image">
                    <img src="{{ $value }}" style="height: 60px">
                </a>
            @endempty
            @endif
        </div>
    </div>
    @error($field_name) <p class="help-block">{{ $message }}</p> @enderror
    @isset($help_text)
        <p class="help-block small">{!! $help_text !!}</p>
    @endisset
</div>

{{--
@include('lte::fields.field-lfm', [
    'label' => 'File',
    'field_name' => 'file_path',
    'value' => isset($name) ? $name->file_path : '',
    'field_id' => 'name',
    'is_image' => 1,
    'placeholder' => 'Select file',
    'data_name' => '[content]name',
    'lfm_category' => 'file',
])
--}}
