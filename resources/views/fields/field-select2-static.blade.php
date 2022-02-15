<div class="form-group field-select2-static"
     @isset($data_url_save)
     data-url-save="{{ $data_url_save }}"
     @endisset
     @isset($data_method_save)
     data-method-save="{{ $data_method_save }}"
     @endisset
>
    @isset($label)
    <label class="control-label">{!! $label !!}</label>
    @endisset
    @php
        $field_name = $field_name ?? '';
        $field_name_input = (isset($multiple) && $multiple) ? (Str::replaceLast('[]', '', $field_name) . '[]') : Str::replaceLast('[]', '', $field_name);
    @endphp

    @php
        $selected = isset($selected) ? (is_array($selected) ? $selected : [$selected]) : [];
        $old = $old ?? old($field_name);
        $old = $old ? (is_array($old) ? $old: [$old]) : [];
        $selected = $old + $selected;
        $attributes = isset($attributes) && is_array($attributes) ? $attributes : [];
    @endphp

    <select
            name="{{ $field_name_input }}"
            data-name="{{ Str::replaceLast('[]', '', $field_name) }}"
            class="form-control select2 select2-static @isset($class) {{ $class }} @endisset"
            @if(isset($multiple) && $multiple && (empty($max) || $max > 1)) multiple @endif
            @if(isset($disabled) && $disabled) disabled @endif
            @if(isset($required) && $required) required @endif
            style="width: 100%;"
            @if(count($attributes) < 6) data-minimum-results-for-search="-1" @endif
            @if(isset($data_attrs) && is_array($data_attrs))
            @foreach($data_attrs as $attr => $val)
            data-{{$attr}}='@json($val)'
            @endforeach
            @endif
    >

        @if(empty($multiple) && empty($empty_value) && count($attributes) > 6)
            <option value="" disabled selected> --- </option>
        @endif

        @if(isset($empty_value) && empty($multiple))
            <option value="" selected> {{ $empty_value }} </option>
        @endisset
        @foreach($attributes as $value => $title)
            <option value="{{ $value }}" @if(in_array($value, $selected)) selected @endif>{{ $title }}</option>
        @endforeach

    </select>
    @isset($help_text)
        <p class="help-block small">{!! $help_text !!}</p>
    @endisset
    <div class="overlay hidden">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
</div>
{!! $errors->first(Str::replaceLast('[]', '', $field_name), '<p class="help-block" style="color:red;">:message</p>') !!}

{{-- Select2 with static options --}}

{{--
@include('lte::fields.field-select2-static', [
    'label' => 'Status',
    'field_name' => 'status',
    'attributes' => [1 => 'New order', 2 => 'In progress'],
    'selected' => [2],
    'empty_value' => trans('lte::main.--not chosen--'),
])
--}}

{{--
@include('lte::fields.field-select2-static', [
    'label' => 'Status',
    'field_name' => 'status',
    'multiple' => 0,
    'max' => 1,
    'disabled' => 0,
    'required' => 1,
    'attributes' => [1 => 'New order', 2 => 'In progress'],
    'selected' => [2],
    'empty_value' => trans('lte::main.--not chosen--'),
    //'data_url_save' => route('lte.data.status'), // For autosave after change
    'class' => 'js-select-blocks',
    'data_attrs' => [
        'map' => [
            'period' => ['.js-block-period'],
            'max_clicks' => ['.js-block-clicks'],
            'max_views' => ['.js-block-views'],
        ],
        'qq' => 'aa'
    ],
])
--}}
