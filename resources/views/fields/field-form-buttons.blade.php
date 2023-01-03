<div class="form-buttons @isset($class) {{$class}} @else pull-right @endisset">
    <div role="group" class="btn-group">
        @empty($url_store_and_continue)
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ trans('lte::main.Save') }}</button>
        @else
            <button type="submit" name="destination" value="{{ $url_store_and_continue }}" class="btn btn-primary"><i class="fa fa-save"></i> {{ trans('lte::main.Save') }}</button>
        @endempty

        @if(isset($url_store_and_create) || isset($url_store_and_close))
            <div class="btn-group">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn dropdown-toggle"><i class="fa fa-caret-down"></i></button>
                <div class="dropdown-menu btn-actions">
                    <div class="btn-group-vertical">
                        @isset($url_store_and_create)
                            <button type="submit" name="destination" value="{{ $url_store_and_create }}" class="btn btn-info"><i class="fa fa-save"></i> {{ trans('lte::main.Save and Create') }}</button>
                        @endisset
                        @isset($url_store_and_close)
                            <button type="submit" name="destination" value="{{ $url_store_and_close }}" class="btn btn-success"><i class="fa fa-save"></i> {{ trans('lte::main.Save and Close') }}</button>
                        @endisset
                    </div>
                </div>
            </div>
        @endif

        @isset($url_destroy)
            <button @if(! empty($url_destroy)) name="destination" value="delete" data-url="{{ $url_destroy }}"  @else disabled @endif @isset($url_after_destroy) data-destination="{{ $url_after_destroy }}" @endisset class="btn btn-danger btn-delete js-action-destroy">
                <i class="fa fa-times"></i> {{ trans('lte::main.Delete') }}
            </button>
        @endisset

        @isset($url_close)
            <a href="{{ $url_close }}" class="btn btn-warning"><i class="fa fa-ban"></i> {{ trans('lte::main.Cancel') }}</a>
        @endisset
    </div>
</div>

{{--
@include('lte::fields.field-form-buttons', [
    'class' => 'pull-left',
    'url_store_and_continue' => '',
    'url_store_and_create' => route('lte.products.create'),
    'url_store_and_close' => session('lte.products.index'),
    'url_destroy' => isset($product) ? route('lte.products.destroy', $product) : '',
    'url_after_destroy' => session('lte.products.index'),
    'url_close' => session('lte.products.index'),
])
--}}