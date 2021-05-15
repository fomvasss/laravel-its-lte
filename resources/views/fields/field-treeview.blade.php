{{-- Иерархическое дерево treeview с checkbox-ами --}}
<!-- <input type="hidden" name="{{ $field_name }}[]" value="0"> -->
<div
     class="box box-warning box-solid field-tree"
     data-url="{{ $url_tree ?? '#' }}"
     data-field-name="{{ $field_name ?? '' }}"
>

    <div class="box-header">
        @isset($label)<h3 class="box-title">{!! $label !!}</h3>@endisset
    </div>
    <div class="box-body">
        <div class="field-tree-data"></div>
        <div class="field-tree-inputs"></div>
    </div>
    <div class="overlay">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
</div>
{!! $errors->first(Str::replaceLast('[]', '', $field_name), '<p class="help-block" style="color:red;">:message</p>') !!}

{{--
@include('lte::fields.field-treeview', [
    'label' => 'Categories',
    'field_name' => 'terms[categories]',
    'url_tree' => url('lte/test/treeview'),
])
--}}
