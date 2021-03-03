@extends('lte::layouts.app')

@section('content')

    @include('lte::layouts.inc.content-header', [
        'page_title' => trans('lte::main.Users'),
        'url_create' => '#'
    ])

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ trans('lte::main.Total') }}: ({{ isset($users) ? $users->total() : 0 }})</h3>
            </div>
            <div class="box-body">
                @if(empty($users) || $users->count() < 1)
                    @include('lte::parts.empty-rows', [/*'url_create' => route('admin.users.create')*/])
                @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width:35px;">#</th>
                            <th>{{ trans('lte::main.Name') }}</th>
                            <th>{{ trans('lte::main.Email') }}</th>
                            <th style="width:130px;">{{ trans('lte::main.Phone') }}</th>
                            <th style="width:130px;">{{ trans('lte::main.Role') }}</th>
                            <th style="width: 30px; text-align: center">{{ trans('lte::main.Active') }}</th>
                            <th style="width:150px;">{{ trans('lte::main.Registration') }}</th>
                            <th style="width:100px;">{{ trans('lte::main.Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td class="text-center">
                                <a href="/vendor/its-lte/img/no-avatar.png" target="_blank">
                                    <img src="/vendor/its-lte/img/no-avatar.png" class="thumbnail-100">
                                </a>
                                <span class="node-row-title">
                                    <a href="/vendor/its-lte/img/no-avatar.png">
                                        {{ $user->name }} <i class="fa fa-pencil"></i>
                                    </a>
                                </span>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->role }}</td>
                            <td style="text-align: center">
                                @if($user->is_active)
                                    <i class="fa fa-check-square-o"></i>
                                @else
                                    <i class="fa fa-square-o"></i>
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td style="width: 110px">
                                <div class="btn-group">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="#" data-url="{{ route('users.destroy', $user) }}" class="btn btn-xs btn-danger js-action-form" data-method="DELETE"><i class="fa fa-remove"></i></a>
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
                    @includeWhen('lte::parts.pagination', ['pages' => $users])
                </div>
            </div>
        </div>
    </section>
@endsection