<div class="form-group">
    @isset($label)<label>{!! $label !!}</label>@endisset
    @php
        $field_name = $field_name ?? '';
        $field_name_input = (isset($multiple) && $multiple) ? (Str::replaceLast('[]', '', $field_name) . '[]') : Str::replaceLast('[]', '', $field_name);
        $attributes = isset($attributes) && is_array($attributes) ? $attributes : [];
        $selected = isset($selected) ? (is_array($selected) ? $selected : [$selected]) : [];
        $old = isset($old) ? (is_array($old) ? $old : [$old]) : [];
    @endphp
    <select
            name="{{ $field_name_input }}"
            class="form-control select2 select2-tags @isset($class) {{ $class }} @endisset"
            @if(isset($multiple) && $multiple) multiple @endif
            @if(isset($disabled) && $disabled) disabled @endif
            @isset($max) data-max="{{$max}}" @endisset
            @isset($separators) data-separators="{{$separators}}" @endisset
            @isset($new_tag_label) data-new-tag-label="{{$new_tag_label}}" @endisset
            @isset($data_url) data-url="{{ $data_url }}" @endisset
            style="width: 100%;"
            @if(isset($data_attrs) && is_array($data_attrs))
            @foreach($data_attrs as $attr => $val)
            data-{{$attr}}='@json($val)'
            @endforeach
            @endif
    >

        @if(!empty($data_url))
            @foreach($selected as $value => $title)
                <option value="{{ $value }}" selected>{{ $title }}</option>
            @endforeach
        @elseif(isset($attributes))
            @foreach($attributes as $value => $title)
                <option value="{{ $value }}" @if(in_array($value, $selected)) selected @endif>{{ $title }}</option>
            @endforeach
        @endif
    </select>
    @isset($help_text)
        <p class="help-block small">{!! $help_text !!}</p>
    @endisset
</div>

{!! $errors->first(Str::replaceLast('[]', '', $field_name), '<p class="help-block" style="color:red;">:message</p>') !!}

{{-- Select2 с статически или динамически (AJAX) загруженными данными  --}}
{{--
@include('lte::fields.field-select2-tags', [
    'label' => 'Tags',
    'data_url' => '/src/data/tag-list.php', //optional, return [results=>[[id=>1, text=>Qwe],[id=>2,text=>Rty]]]
    'selected' => [1 => 'News'],
    //'attributes' => [1 => 'News', 2 => 'Sport', 3 => 'Politics'],
    //'selected' => [1],
    'field_name' => 'tags',
    'separators' => "[';']",
    'new_tag_label' => ' [NEW]',
    'max' => 3,
    'multiple' => 1,
    'disabled' => 0,
    'old' => old('tags'),
    'help_text' => 'Select or Create tag'
])
--}}
