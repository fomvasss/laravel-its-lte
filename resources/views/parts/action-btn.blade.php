<div class="btn-group">
    @isset($show)
    <a href="{{ $show }}" class="btn btn-success {!! config('its-lte.view.btn_actions_class', 'btn-xs') !!} " target="_blank"><i class="fa fa-eye"></i></a>
    @endisset
    @isset($edit)
    <a href="{{ $edit }}" class="btn btn-warning {!! config('its-lte.view.btn_actions_class', 'btn-xs') !!} "><i class="fa fa-edit"></i></a>
    @endisset
    @isset($delete)
    <a href="{{ $delete }}" class="btn btn-danger {!! config('its-lte.view.btn_actions_class', 'btn-xs') !!}  js-action-form" data-method="DELETE"><i class="fa fa-remove"></i></a>
    @endisset
</div>