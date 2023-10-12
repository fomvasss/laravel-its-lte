<div class="form-group @error('path') has-error @enderror">
    @php
        $field_name = isset($field_name) ? $field_name : '';
    @endphp
    @foreach($attributes as $value => $label)
        <div class="">
            <input class="radio @isset($class) {{ $class }} @endisset"
                   type="radio"
                   name="{{ $field_name }}"
                   id="{{ $field_name.$loop->index }}"
                   value="{{ $value }}"
                   @if($selected == $value) checked="" @endif
                   @isset($data_name) data-name="{{$data_name}}" @endisset
            >
            @isset($label)<label for="{{ $field_name.$loop->index }}">{{ $label }}</label>@endisset
        </div>
    @endforeach
    @error($field_name) <p class="help-block">{{ $message }}</p> @enderror
</div>

{{--
@include('lte::fields.field-radio-group', [
    'field_name' => 'path_type',
    'selected' => isset($menuItem) ? $menuItem->path_type : 1,
    'attributes' => [1 => 'URL-путь', 2 => 'URL-алиас',]
])
--}}
