<div
        class="form-group field-select2-tree-ajax"
        data-url="{{ $data_url_tree ?? '#' }}"
        data-valFld="id"
        data-labelFld="name"
        data-incFld="children"
>
    <label>{{ $label ?? 'Список' }}</label>
    @php
        $field_name = $field_name ?? '';
        $field_name_input = (isset($multiple) && $multiple) ? (Str::replaceLast('[]', '', $field_name) . '[]') : Str::replaceLast('[]', '', $field_name);
    @endphp
    <select name="{{ $field_name }}"
            class="form-control select2-tree @isset($class) {{ $class }} @endisset"
            style="width: 100%;"
            @if(isset($multiple) && $multiple) multiple @endif
            @if(isset($disabled) && $disabled) disabled @endif
            @if(isset($required) && $required) required @endif
    >
    </select>
    @isset($help_block)
    <p class="help-block small">{!! $help_block !!}</p>
    @endisset
    <div class="overlay">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
</div>
{!! $errors->first(Str::replaceLast('[]', '', $field_name), '<p class="help-block" style="color:red;">:message</p>') !!}

{{--
@include('lte::fields.field-select2-tree-ajax', [
    'label' => 'Основная категория',
    'field_name' => 'category_id',
    // 'multiple' => 1,
    // 'disabled' => 0,
    'required' => 1,
    'help_block' => '* Какая-то подсказка о поле',
    'data_url_tree' => route('lte.terms.treeselect', [
        'vocabulary' => 'product_categories',
        'selected' => isset($product) ? $product->category_id : [],
    ]),
])
--}}