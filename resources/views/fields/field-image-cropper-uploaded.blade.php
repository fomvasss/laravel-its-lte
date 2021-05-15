<div class="form-group field-image-cropper-uploaded">
    @php
        $field_name_input = isset($field_name) ? (Str::replaceLast('[]', '', $field_name)) : '';
        $field_name_deleted = isset($field_name) ? (Str::replaceLast('[]', '', $field_name) . '_deleted') : '';
        $collection_name = isset($field_name) ? (Str::replaceLast('[]', '', $field_name)) : '';
        $img_width = isset($img_width) ? $img_width : '';
        $img_height = isset($img_height) ? $img_height : '';
        $show_preview = isset($show_preview) ? $show_preview : false;
    @endphp
    @isset($label)<label>{!! $label !!} ({{ trans('lte::main.Size') .': '. $img_width .'х'. $img_height }})</label>@endisset
    <input type="file" class="form-control field-cropper"
           data-size-width="{{ $img_width }}"
           data-size-height="{{ $img_height }}"
           data-field-name="{{ $field_name_input }}"
           data-show-preview="{{ $show_preview }}"
    >
    {{--<p class="help-block">Максимальный размер изображения 512кБ</p>--}}
    @if(isset($entity) && $entity->getFirstMediaUrl($collection_name))
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    {{--<th>{{ trans('lte::main.Title') }}</th>--}}
                    <th>{{ trans('lte::main.Photo') }}</th>
                    <th style="width: 40px">{{ trans('lte::main.Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    {{--<td><a href="{{ $entity->getFirstMediaUrl($collection_name) }}" target="_blank">{{ \Illuminate\Support\Str::limit($entity->getFirstMedia($collection_name)->name, 30) }}</a></td>--}}
                    <td><a href="{{ $entity->getFirstMediaUrl($collection_name) }}" target="_blank"><img src="{{ $entity->getFirstMedia($collection_name)->getUrl() }}" style="height: 150px;" alt=""></a></td>
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
@include('lte::fields.field-image-cropper-uploaded',[
    'label' => 'Image Crop',
    'field_name' => 'image_pr',
    'img_width' => 300,
    'img_height' => 240,
    'show_preview' => true,
    'entity' => isset($post) ? $post : null,
])
--}}
