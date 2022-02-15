@foreach($items as $item)
    <li data-id="{{ $item->id }}">
    <span class="handle">
    <i class="fa fa-arrows"></i>
    </span>
        @isset($route_name_edit)
            <a href="{{ route($route_name_edit, array_merge([$item], $route_additional_attrs)) }}"
               style="color: rgb(68, 68, 68)" class="hierarchy-item-title">
                <span class="text hover-edit">{{ $item->name }}</span>
            </a>
        @else
            <span class="text hover-edit">{{ $item->name }}</span>
        @endisset

        <span class="tools">
            @isset($route_name_show)
                <a href="{{ route($route_name_show, $item) }}" target="_blank" class="text-success"><i class="fa fa-eye"></i></a>
            @endif
            @empty(!$has_hierarchy)
                <a href="{{ route($route_name_create, array_merge(['parent_id' => $item->id], $route_additional_attrs)) }}" class="text-success"><i class="fa fa-plus-square-o"></i></a>
            @endif
            @isset($route_name_edit)
            <a href="{{ route($route_name_edit, array_merge([$item], $route_additional_attrs)) }}" class="text-warning"><i class="fa fa-edit"></i></a>
            @endisset
            @isset($route_name_delete)
            <a href="#" class="text-danger js-action-form" data-method="DELETE" data-url="{{ route($route_name_delete, $item) }}" data-confirm="{{ trans('lte::main.Delete') }}?"><i class="fa fa-trash-o"></i></a>
            @endisset
        </span>
        @if(!empty($item->children) && $item->children->count())
            <ul>
                @include('lte::fields.hierarchical.item', ['items' => $item->children])
            </ul>
        @elseif($has_hierarchy)
            <ul></ul>
        @endif
    </li>
@endforeach
