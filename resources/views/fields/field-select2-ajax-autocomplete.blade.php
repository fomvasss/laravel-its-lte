<div class="form-group">
    <label>{!! $label ?? 'Значения' !!}</label>
    @php
        $field_name = $field_name ?? '';
        $field_name_input = (isset($multiple) && $multiple) ? (Str::replaceLast('[]', '', $field_name) . '[]') : Str::replaceLast('[]', '', $field_name);
    @endphp
    <select
            name="{{ $field_name_input }}"
            class="form-control select2 field-select-ajax @isset($class) {{ $class }} @endisset"
            @if(isset($multiple) && $multiple) multiple @endif
            @if(isset($disabled) && $disabled) disabled @endif
            data-url="{{ $data_url }}"
            style="width: 100%;"
    >
        @php
            $selected = isset($selected) ? (is_array($selected) ? $selected : [$selected => $selected]) : [];
            $old = isset($old) ? (is_array($old) ? $old : [$old]) : [];
            //$selected = $old + $selected;
        @endphp

        @foreach($selected as $value => $title)
            <option value="{{ $value }}" selected>{{ $title }}</option>
        @endforeach
    </select>
</div>

{!! $errors->first(Str::replaceLast('[]', '', $field_name), '<p class="help-block" style="color:red;">:message</p>') !!}

{{-- Select2 с динамически загруженными данными через AJAX --}}
{{--
@include('lte::fields.field-select2-ajax-autocomplete', [
    'label' => 'Теги статьи',
    'data_url' => '/src/data/change-status.php',
    'field_name' => 'tags',
    'multiple' => 1,
    'disabled' => 0,
    'selected' => isset($article) && ($article->tags) ? [$article->tags->id => url($article->tags->name)] : null,
    'old' => old('tags')
])
--}}