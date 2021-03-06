<section class="content-header">
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> {{ trans('lte::alerts.excellent') }}</h4>
            {{ $message }}
        </div>
    @endif

    @if($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> {{ trans('lte::alerts.failure') }}</h4>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if($message = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> {{ trans('lte::alerts.warning') }}</h4>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if($message = Session::get('info'))
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> {{ trans('lte::alerts.information') }}</h4>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> {{ trans('lte::alerts.failure') }}</h4>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
</section>