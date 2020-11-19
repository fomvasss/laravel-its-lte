<script>
    @php
        $flashKeys = [
            'warning' => trans('lte::alerts.warning'),
            'success' => trans('lte::alerts.excellent'),
            'info' => trans('lte::alerts.information'),
            'error' => trans('lte::alerts.failure'),
        ];
    @endphp

    @foreach ($flashKeys as $key => $title)
        @if (Session::has($key))
            swal('{{ $title }}', '{{ Session::get($key) }}', '{{ $key }}');
        @endif
    @endforeach

    @if (isset($errors) && $errors->any())
        @foreach ($errors->all() as $error)
            swal('{{ trans('lte::alerts.failure') }}', '{{ $error }}', 'error');
        @endforeach
    @endif
</script>