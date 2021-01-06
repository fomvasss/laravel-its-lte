<div class="form-group field-more-items">
    <label>{!! $label ?? 'Изображение' !!}</label>
    @php
        $field_name_input = isset($field_name) ? (Str::replaceLast('[]', '', $field_name)) : '';
        $field_name_deleted = isset($field_name) ? (Str::replaceLast('[]', '', $field_name) . '_deleted') : '';
    @endphp
    <input type="file" name="{{ $field_name_input }}">
    {{--<p class="help-block">Максимальный размер изображения 512кБ</p>--}}
    @if(!empty($path))
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ trans('lte::main.Title') }}</th>
                    <th>{{ trans('lte::main.Photo') }}</th>
                    <th style="width: 40px">{{ trans('lte::main.Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="{{ $path }}" target="_blank">{{ Str::limit($path, 30) }}</a></td>
                    <td><a href="{{ $path }}" target="_blank"><img src="{{ $path."?=".date('s') }}" style="max-height: 50px"></a></td>
                    <td>
                        <a href="#" class="filed-remove btn btn-xs btn-danger" data-id="{{ $path }}"><i class="fa fa-remove"></i></a>
                        <input type="hidden" name="{{ $field_name_deleted }}" class="field-delete-item" value="">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @else
        <p class="text-warning">{!! trans('lte::fields.File not loaded')  !!}</p>
    @endif
</div>
@error(Str::replaceLast('[]', '', $field_name)) <p class="help-block" style="color:red;">{{ $message }}</p> @enderror

{{--
@include('lte::fields.field-image-uploaded',[
    'label' => 'Изображение',
    'field_name' => 'image',
    'entity' => isset($menuItem) ? $menuItem : null,
])
--}}
