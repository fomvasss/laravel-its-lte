<div class="form-group">
    @isset($label)<label>{{ $label }}</label>@endisset
    @if(isset($show_saved) && $show_saved)
    <h5>
        От: <strong>{{ $date_start ?? '' }}</strong>&emsp;
        До: <strong>{{ $date_end ?? '' }}</strong>
    </h5>
    @endif
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input name="{{ $field_name ?? '' }}"
               autocomplete="off" type="text"
               class="form-control pull-right lte-daterangepicker @isset($class) {{ $class }} @endisset"
               data-input-name-start="{{ $field_name_start ?? '' }}"
               data-input-name-end="{{ $field_name_end ?? '' }}"
               value="{{ $date_start ?? '' }} - {{ $date_end ?? '' }}">
        <input type="hidden" name="{{ $field_name_start ?? '' }}" value="{{ $date_start ?? '' }}">
        <input type="hidden" name="{{ $field_name_end ?? '' }}" value="{{ $date_end ?? '' }}">
    </div>
    @error($field_name ?? '')<p class="help-block" style="color:red;">:message</p>@enderror
    @error($field_name_start ?? '')<p class="help-block" style="color:red;">:message</p>@enderror
    @error($field_name_end ?? '')<p class="help-block" style="color:red;">:message</p>@enderror
</div>

{{--
@include('lte::fields.field-daterangepicker', [
    'label' => 'Укажите период:',
    'field_name' => 'range',
    'field_name_start' => 'start_at',
    'field_name_end' => 'end_at',
    'date_start' => isset($sale) ? $sale->start_at->format('m/d/Y') : date('m/d/Y'),
    'date_end' => isset($sale) ? $sale->end_at->format('m/d/Y+') : date('m/d/Y'),
    'show_saved' => true,
])
--}}
