@extends('lte::layouts.app')

@php
    $content_header = [
        'page_title' => 'Страницы',
        'small_page_title' => '',
        'url_back' => '',
        'url_create' => '#'
    ]
@endphp

@section('content')
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Список страниц ({{ isset($pages) ? $pages->total() : 0 }})</h3>
        </div>
        <div class="box-body">
            @if(isset($pages) && $pages->count())
                @include('lte::fields.empty-rows', ['url_create' => route('admin.pages.create')])
            @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:35px;">#</th>
                        <th>Название</th>
                        <th style="text-align: center">Опубликовано</th>
                        <th>Шаблон</th>
                        <th style="width:100px;">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    // TODO: this test
                    $pages = array_map(function ($item) {
                        return (object) $item;
                    }, [['id' => 1, 'name' => 'Главная страница', 'publish' => true]]);
                    @endphp
                    @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->name }}</td>
                        <td style="text-align: center">
                            @if($page->publish)<i class="fa fa-check-square-o"></i>@else<i class="fa fa-square-o"></i>@endif
                        </td>
                        <td>{{ $page->blade ?? 'По умолчанию' }}</td>

                        <td style="width: 110px">
                            <div class="btn-group">
                                <a href="#" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                <a href="/lte/pages/edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="#" data-url="#" class="btn btn-xs btn-danger js-action-form" data-method="DELETE"><i class="fa fa-remove"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>

        <div class="box-footer">
            <div class="pull-right">
{{--                @include('admin.inc.pagination', ['pages' => $pages])--}}
            </div>
        </div>
    </div>
</section>
@endsection