@php($collapsed = isset($collapsed) ? $collapsed : !request()->has('_f'))

<form action="{{ \Request::fullUrl() }}" method="GET">
    <div class="box box-widget @if($collapsed) collapsed-box @endif">
        <div class="box-header with-border">
            <h3 class="box-title" data-widget="collapse">{{ trans('lte::main.Filter') }} <i class="fa fa-angle-down"></i></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    @if($collapsed) <i class="fa fa-plus"></i> @else <i class="fa fa-minus"></i> @endif
                </button>
            </div>
        </div>
        <div class="box-body" @if($collapsed) style="display: none" @endif>
            <input type="hidden" name="_f" value="1">
            @yield('body')
        </div>
        <div class="box-footer" @if($collapsed) style="display: none" @endif>
            <div class="form-buttons pull-right ">
                <div role="group" class="btn-group">
                    <a href="{{ Request::url() }}" class="btn btn-sm btn-default">{{ trans('lte::main.Reset') }}</a>
                    {{--<a href="{{ Request::url() . '?' . http_build_query(request()->only('type')) }}" class="btn btn-sm btn-default">{{ trans('lte::main.Reset') }}</a>--}}
                    <button type="submit" class="btn btn-sm btn-success">{{ trans('lte::main.Apply') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>