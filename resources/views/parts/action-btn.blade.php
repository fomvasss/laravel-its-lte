<div class="btn-group">
    @isset($show)
    <a href="{{ $show }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
    @endisset
    @isset($edit)
    <a href="{{ $edit }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
    @endisset
    @isset($delete)
    <a href="{{ $delete }}" class="btn btn-xs btn-danger js-action-form" data-method="DELETE"><i class="fa fa-remove"></i></a>
    @endisset
</div>