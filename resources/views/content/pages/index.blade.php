@extends('lte::layouts.app')

@php
    $pages_header = [
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
            <h3 class="box-title">Всего: {{ isset($pages) ? $pages->total() : 0 }}</h3>
        </div>
        <div class="box-body">
            @if(empty($pages) || $pages->count() < 1)
                @include('lte::parts.empty-rows', [/*'url_create' => route('admin.pages.create')*/])
            @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:35px;">#</th>
                        <th>Название</th>
                        <th style="text-align: center">Публиковать</th>
                        <th>Шаблон</th>
                        <th style="width:100px;"></th>
                    </tr>
                    </thead>
                    <tbody>
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
                                <a href="{{ route('pages.show', $page) }}" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="#" data-url="{{ route('admin.users.destroy', $page) }}" class="btn btn-xs btn-danger js-action-form" data-method="DELETE"><i class="fa fa-remove"></i></a>
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
                {{--@include('lte::parts.pagination', ['pages' => $pages])--}}
            </div>
        </div>
    </div>
</section>
@endsection