@extends('lte::layouts.app')

@php
    $content_header = [
        'page_title' => 'Пользователи',
        'small_page_title' => '',
        'url_back' => '',
        'url_create' => url('lte/users/create')
    ]
@endphp

@section('content')
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Список пользователей ({{ isset($pages) ? $users->total() : 0 }})</h3>
        </div>
        <div class="box-body">
            @if(isset($pages) && $pages->count())
                @include('lte::inc.empty-rows', ['url_create' => route('content.users.create')])
            @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:35px;">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th style="width:130px;">Phone</th>
                        <th style="width:130px;">Роль</th>
                        <th style="width: 30px; text-align: center">Активный</th>
                        <th style="width:150px;">Регистрация</th>
                        <th style="width:100px;">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        // TODO: this test
                        $users = array_map(function ($item) {
                            return (object) $item;
                        }, [['id' => 1, 'name' => 'Иванов', 'email' => 'ivanov@app.com', 'phone' => '7456321987',  'active' => true, 'created_at' => now(), 'roles' => '']]);
                    @endphp
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->roles ? $user->roles->implode('title', ', ') : 'Пользователь' }}</td>
                        <td style="text-align: center">
                            @if($user->active)<i class="fa fa-check-square-o"></i>@else<i class="fa fa-square-o"></i>@endif
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td style="width: 110px">
                            <div class="btn-group">
                                {{--<a href="#" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>--}}
                                <a href="/lte/users/edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
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
{{--                @include('lte::inc.pagination', ['pages' => $users])--}}
            </div>
        </div>
    </div>
</section>
@endsection