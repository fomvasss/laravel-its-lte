<div class="box">
    <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">{{ $box_title ?? 'Список терминов таксономии' }} @isset($terms)({{ $terms->count() }})@endisset</h3>
        <div class="pull-right box-tools">
            <button
                    type="button"
                    data-url="{{ isset($route_name_save_tree) ? route($route_name_save_tree) : '#' }}"
                    data-entity-name="{{ $entity_name ?? 'term' }}"
                    class="post-tree-sortaple btn btn-success btn-sm ajax"
                    data-widget="add"
                    data-toggle="tooltip"
                    title="Сохранить">
                <i class="fa fa-save"></i>
            </button>
        </div>
    </div>
    <div class="box-body">

        @if(isset($terms) && $terms->count())
            <ul class="todo-list tree-sortable" data-entity-name="{{ $entity_name ?? 'term' }}">
                @include('lte::fields.hierarchical.item', [
                    'items' => $tree,
                    'has_hierarchy' => $has_hierarchy ?? 0,
                    'route_name_show' => $route_name_show ?? '',
                    'route_additional_attrs' => $route_additional_attrs ?? []
                ])
            </ul>
        @else
            @include('lte::inc.empty-rows', ['url_create' => isset($url_create_root) ? ($url_create_root) : '#'])
        @endif
    </div>
</div>

{{--
@include('lte::fields.hierarchical.tree', [
    'terms' => $terms,
    'tree' => $tree,
    'has_hierarchy' => $vocabulary->options['has_hierarchy'] ?? 0,
    'box_title' => 'Список терминов',
    'entity_name' => 'term',
    'route_name_save_tree' => 'lte.terms.order',
    'route_name_edit' => 'lte.terms.edit',
    'route_name_create' => 'lte.terms.create',
    //'route_name_show' => 'lte.menu-items.show',
    'route_name_delete' => 'lte.terms.destroy',
    'route_additional_attrs' => ['vocabulary' => $vocabulary->system_name],
])
--}}
