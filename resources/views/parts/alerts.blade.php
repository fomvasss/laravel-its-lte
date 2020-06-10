@includeWhen(in_array('bootstrap', config('its-lte.view.alerts', [])), 'lte::parts.alerts.bootstrap')

@if(in_array('toastr', config('its-lte.view.alerts', [])))
    @push('scripts')
        @include('lte::parts.alerts.toastr')
    @endpush
@endif

@if(in_array('sweetalert', config('its-lte.view.alerts', [])))
    @push('scripts')
        @include('lte::parts.alerts.sweetalert')
    @endpush
@endif
