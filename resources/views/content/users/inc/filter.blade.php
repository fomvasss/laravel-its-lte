<form action="{{ Request::fullUrl() }}" method="GET">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('lte::main.Filter') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('lte::main.Name') }}</label>
                        <input type="text" name="filter[name]" value="{{ request('filter.name') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('lte::main.Email') }}</label>
                        <input type="text" name="filter[email]" value="{{ request('filter.email') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('lte::main.Phone') }}</label>
                        <input type="text" name="filter[phone]" value="{{ request('filter.phone') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    @include('lte::fields.field-select2-static', [
                       'label' => trans('lte::main.Status'),
                       'field_name' => 'filter[status]',
                       'attributes' => ['active' => 'Active'],
                       'selected' => request('filter.status'),
                       'empty_value' => trans('lte::main.--not chosen--'),
                   ])
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    @include('lte::fields.field-datepicker', [
                        'label' => 'Register from',
                        'field_name' => 'filter[created_at_from]',
                        'value' => request('filter.created_at_from'),
                    ])
                </div>
                <div class="col-md-3">
                    @include('lte::fields.field-datepicker', [
                        'label' => 'Register to',
                        'field_name' => 'filter[created_at_to]',
                        'value' => request('filter.created_at_to'),
                    ])
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="form-buttons pull-right ">
                <div role="group" class="btn-group">
                    <a href="{{ Request::url() }}" class="btn btn-sm btn-default">{{ trans('lte::main.Reset') }}</a>
                    <button type="submit" class="btn btn-sm btn-success">{{ trans('lte::main.Apply') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
