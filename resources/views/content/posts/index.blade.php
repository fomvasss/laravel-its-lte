@extends('lte::layouts.app')

@section('content')

    @include('lte::layouts.inc.content-header', [
        'page_title' => trans('lte::main.Articles'),
        'small_page_title' => trans('lte::main.List'),
        'url_create' => route('control.posts.create')
    ])

<section class="content">
    @include('lte::content.posts.inc.filter')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ trans('lte::main.Total') }}: {{ isset($posts) ? $posts->total() : 0 }}</h3>
        </div>
        <div class="box-body">
            @if(empty($posts) || $posts->count() < 1)
                @include('lte::parts.empty-rows', [/*'url_create' => route('control.posts.create')*/])
            @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:35px;">#</th>
                        <th>{{ trans('lte::main.Name') }}</th>
                        <th style="text-align: center">{{ trans('lte::main.Status') }}</th>
                        <th>{{ trans('lte::main.Date') }}</th>
                        <th style="width:100px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <a href="{{ route('control.posts.edit', $post) }}">{{ $post->name }}</a>
                        </td>
                        <td style="text-align: center">
                            @if($post->status === 'publish')
                                <i class="fa fa-check-square-o"></i>
                            @else
                                <i class="fa fa-square-o"></i>
                            @endif
                        </td>
                        <td>{{ $post->created_at }}</td>

                        <td class="wh-center btn-media">
                            <a href="{{ route('posts.show', $post->slug) }}" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('control.posts.edit', $post) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="#" data-url="{{ route('control.posts.destroy', $post) }}" class="btn btn-xs btn-danger js-action-form" data-method="DELETE" data-confirm="{{ trans('lte::main.Delete') }}?"><i class="fa fa-trash"></i></a>
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
                @includeWhen(isset($posts), 'lte::parts.pagination', ['pages' => $posts])
            </div>
        </div>
    </div>
</section>
@endsection
