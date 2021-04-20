<div class="form-group field-more-items">
    @isset($label)<label>{!! $label !!}</label>@endisset
    @php
        $field_name_input = isset($field_name) ? (Str::replaceLast('[]', '', $field_name)) : '';
        $field_name_deleted = isset($field_name) ? (Str::replaceLast('[]', '', $field_name) . '_deleted') : '';
        $collection_name = isset($field_name) ? (Str::replaceLast('[]', '', $field_name)) : '';
    @endphp
    <input type="file" name="{{ $field_name_input }}">
    {{--<p class="help-block">Максимальный размер изображения 512кБ</p>--}}
    @if(isset($entity) && $entity->getFirstMediaUrl($collection_name))
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
                    <td><a href="{{ $entity->getFirstMediaUrl($collection_name) }}" target="_blank">{{ \Illuminate\Support\Str::limit($entity->getFirstMedia($collection_name)->name, 30) }}</a></td>
                    <td><a href="{{ $entity->getFirstMediaUrl($collection_name) }}" target="_blank"><img src="{{ $entity->getFirstMedia($collection_name)->getUrl('thumb') }}" alt=""></a></td>
                    <td>
                        <a href="#" class="filed-remove btn btn-xs btn-danger" data-id="{{ $entity->getFirstMedia($collection_name)->id }}"><i class="fa fa-remove"></i></a>
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
