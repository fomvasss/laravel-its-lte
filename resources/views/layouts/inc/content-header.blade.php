<section class="content-header">
    <h1>
        @if(!empty($url_back))
            <a href="{{ $url_back }}" class="btn btn-xs btn-warning"><i class="fa fa-chevron-left"></i> {{ trans('lte::main.Back') }}</a>
        @endif

        @isset($page_title) {!! $page_title !!} @endisset
        @isset($small_page_title)<small>{{ $small_page_title }}</small>@endisset

        @if(!empty($url_create))
            <a href="{{ $url_create }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> {{ trans('lte::main.Create') }}</a>
        @endif
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('lte::main.Home page') }}</a></li>
        @isset($page_title)
        <li class="active">{{ $page_title }}</li>
        @endisset
    </ol>
</section>

{{--
    @include('lte::layouts.inc.content-header', [
       'page_title' => 'Аккаунт',
       'small_page_title' => 'Admin Bob',
       'url_back' => '',
       'url_create' => ''
   ])
--}}