<script>
    @php
        $flashKeys = [
            'warning' => ['type' => 'warning', 'title' => trans('lte::notifications.warning')],
            'success' => ['type' => 'success', 'title' => trans('lte::notifications.excellent')],
            'info' => ['type' => 'info', 'title' => trans('lte::notifications.information')],
            'error' => ['type' => 'danger', 'title' => trans('lte::notifications.failure')],
        ];
    @endphp

    @foreach ($flashKeys as $keyName => $item)
        @if (Session::has($keyName))
            swal('{{ $item['title'] }}', '{{ Session::get($keyName) }}', '{{ $item['type'] }}');
        @endif
    @endforeach

    @if (isset($errors) && $errors->any())
        @foreach ($errors->all() as $error)
            swal('{{ trans('notifications.failure') }}', '{{ $error }}', 'danger');
        @endforeach
    @endif
</script>