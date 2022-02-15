@php
    $field_laravel_name = trim(preg_replace('/[\]\[]/', '.', $field_name), '.');
    $items = $items ?? [];
    //$items = array_merge(old($field_laravel_name, []), ['qq' => 'Qq', 'ww' => 'Ww']); // TODO
    $placeholder_value = isset($placeholder_value) ? $placeholder_value : '';
@endphp

<div class="form-group field-linear-list"
     data-field-name="{{ $field_name }}"
     data-placeholder-value="{{ $placeholder_value }}"
>
    <label>{{ $label ?? 'Пункты' }}</label>
    <div class="table-responsive">
        <table class="table table-striped">
            <tbody>
                @forelse($items as $item)
                <tr class="item first">
                    <td>
                        <div class="input-group input-group-md">
                            <span class="input-group-btn" style="width: 100%">
                                <input type="text" name="{{ $field_name }}[]" value="{!! $item ?? '' !!}" class="form-control" placeholder="{{ $placeholder_value .' '. $loop->iteration }}">
                            </span>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-flat">
                                    <i class="fa fa-remove"></i>
                                </button>
                            </span>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="item first">
                    <td>
                        <div class="input-group input-group-md">
                            <span class="input-group-btn" style="width: 100%">
                                 <input type="text" class="form-control" name="{{ $field_name}}[]" placeholder="{{ $placeholder_value }}">
                            </span>
                            </span>
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button type="button" disabled class="btn btn-danger btn-flat">
                                    <i class="fa fa-remove"></i>
                                </button>
                            </span>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {!! $errors->first($field_laravel_name, '<p class="help-block" style="color:red;">:message</p>') !!}
    </div>
</div>

{{--
@include('lte::fields.field-linear-list', [
   'label' => 'Пример линейного списка',
   'field_name' => 'vars_json[phones]',
   'placeholder_value' => 'Значение',
   'items' => [],
])
--}}