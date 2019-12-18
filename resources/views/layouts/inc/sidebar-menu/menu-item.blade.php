@if($item->children->count() && $item->hasAccessToTreeview())
    <li class="treeview @if($item->isTreeviewOpen())menu-open @endif">
        <a href="{{ $item->getUrl() ?: '#' }}" {{ $item->getTargetStr() }}>
            <i class="@empty($item->options['icon']) fa fa-circle-o text-green @else {{ $item->options['icon'] }} @endempty"></i>
            <span>{{ $item->name }}</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu" @if($item->isTreeviewOpen())style="display: block;" @endif>
            @foreach($item->children as $itemCh)
                @include('lte::layouts.inc.sidebar-menu.menu-item', ['item' => $itemCh])
            @endforeach
        </ul>
    </li>
@elseif(! empty($item->options['header']))
    <li class="header">{{ $item->name }}</li>
@elseif($item->hasAccessToItem())
    <li class="@if($item->isActive())active @endif">
        <a href="{{ $item->getUrl() ?: '' }}" {{ $item->getTargetStr() }}>
            <i class="@empty($item->options['icon']) fa fa-circle-o text-green @else {{ $item->options['icon'] }} @endempty"></i>
            <span>{{ $item->name }}</span>
            {!! $item->getSuffix() !!}
        </a>
    </li>
@endif