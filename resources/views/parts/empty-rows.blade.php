<div class="alert alert-warning alert-dismissible no-margin">
    <h4><i class="icon fa fa-warning"></i> {!! $msg_title ?? trans('lte::main.Content not created!') !!}</h4>
    @isset($msg_body){!! $msg_body  !!} @else {{ trans('lte::main.Recommend creating a material') }} @endisset
    @isset($url_create)
        <a href="{{ $url_create }}" class="btn btn-xs btn-success">
            <i class="fa fa-plus"></i>
        </a>
    @endisset
</div>

{{--
@include('lte::parts.empty-rows', [
    'url_create' => route('users.create'),
    'msg_title' => 'Поиск не дал результатов',
    'msg_body' => 'Измените поисковый запрос, и попробуйте снова',
])
--}}