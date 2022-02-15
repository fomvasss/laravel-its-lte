@php
    $value = isset($value) ? $value : null;
    $field_name = isset($field_name) ? $field_name : '';
    $label = isset($label) ? $label : '['.trans('lte::main.Value').']';
@endphp

<a href="#"
   class="field-x-editable @isset($class) {{ $class }} @endisset"
   data-value="{{ $value }}"
   data-type="{{ isset($type) ? $type : 'text' }}"
   data-name="{{ $field_name }}"
   @isset($viewformat)data-viewformat="{{$viewformat}}"@endisset
   @isset($source)data-source="{{ json_encode($source) }}"@endisset
   @isset($url)data-url="{{ $url }}"@endisset
   @isset($pk)data-pk="{{ $pk }}"@endisset
> {{ $value_title ?? $value ?? $label }}
</a>

{{--
 @include('lte::fields.field-x-editable', [
    'value' => $form->data['message'] ?? '[Вопрос]',
    'type' => 'textarea',
    'field_name' => 'data[message]',
    'pk' => $form->id,
    'url' => route('lte.forms.editable', $form),
])
--}}

{{--
@include('lte::fields.field-x-editable', [
    'value' => 1,
    'valueTitle' => 'Отображать',
    'type' => 'select',
    'field_name' => 'data[show_if_empty_filter]',
    'source' => [["value" => "1", "text" => "Отображать"], ["value" => "0", "text" => "Скрывать"]],
    'pk' => $attribute->id,
    'url' => route('lte.shop.attributes.editable', $attribute),
])
--}}

{{-- See more: https://vitalets.github.io/x-editable/docs.html --}}