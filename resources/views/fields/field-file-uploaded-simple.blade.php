<div class="form-group field-more-items">
    <label>{!! $label ?? 'Файл' !!}</label>
    @php
        $field_name_input = isset($field_name) ? (Str::replaceLast('[]', '', $field_name)) : '';
    @endphp
    <input type="file" name="{{ $field_name_input }}">
    {{--<p class="help-block">Максимальный размер файла 10мБ</p>--}}
    @empty($path)
        <p class="text-warning">{!! trans('lte::fields.File not loaded')  !!}</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ trans('lte::main.Title') }}</th>
                    <th style="width: 40px">{{ trans('lte::main.Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="{{ $path }}" target="_blank">{{ Str::limit($path, 30) }}</a></td>
                    <td>
                        <a href="#" class="filed-remove btn btn-xs btn-danger" data-id="{{ $path }}"><i class="fa fa-remove"></i></a>
                        @isset($field_name_deleted)
                        <input type="hidden" name="{{ $field_name_deleted }}" class="field-delete-item" value="">
                        @endisset
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>
@error(Str::replaceLast('[]', '', $field_name)) <p class="help-block" style="color:red;">{{ $message }}</p> @enderror
{{--
@include('lte::fields.field-file-uploaded-simple',[
    'label' => 'Файл',
    'field_name' => 'file',
    'entity' => $path,
])
--}}
