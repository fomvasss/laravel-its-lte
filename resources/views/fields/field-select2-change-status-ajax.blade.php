@php
    $field_name = $field_name ?? '';
@endphp
<div class="form-group field-select2-change-status-ajax"
     data-url="{{ $data_url ?? '#' }}"
     data-method="POST"
>
    @isset($label)
        <label class="control-label">{!! $label !!}</label>
    @endisset
    <select 
        name="{{ $field_name ?? '' }}"
        data-minimum-results-for-search="Infinity"
        class="form-control select2 select2-change-status-ajax @isset($class) {{ $class }} @endisset"
        style="width: 100%;"
    >
        @php
            $selected = isset($selected) ? (is_array($selected) ? $selected : [$selected]) : [];
            $attributes = isset($attributes) && is_array($attributes) ? $attributes : [];
        @endphp
        @if(isset($empty_value))
            <option value="" selected> {{ $empty_value }} </option>
        @endisset
        @foreach($attributes as $value => $title)
            <option value="{{ $value }}" @if(in_array($value, $selected)) selected @endif>{{ $title }}</option>
        @endforeach
    </select>
    <div class="overlay hidden">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
</div>

{{--
@include('lte::fields.field-select2-change-status-ajax', [
    'label' => 'Status',
    'field_name' => 'status',
    'attributes' => ['new' => 'New', 'success' => 'Success',  'error' => 'Error'],
    'selected' => 'success',
    'empty_value' => '--не указано--',
    'data_url' => route('lte.data.status'),
])
--}}