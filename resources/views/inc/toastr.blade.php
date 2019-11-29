<script>
    @php
        $flashKeys = ['warning','success','info','error',]
    @endphp

    @foreach ($flashKeys as $keyName)
        @if (\Illuminate\Support\Facades\Session::has($keyName))
            toastr.{{$keyName}}("{{ \Illuminate\Support\Facades\Session::get($keyName) }}");
        @endif
    @endforeach

    @if (isset($errors) && $errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
    @endif
</script>