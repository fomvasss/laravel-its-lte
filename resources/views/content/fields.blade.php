@extends('lte::layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Example items list</h3>

                        <div class="box-tools pull-right">
                            <ul class="pagination pagination-sm inline">
                                @foreach(['RU' => 'Русский', 'EN' => 'English', 'UA' => 'Українська'] as $key => $locale)
                                    <li @if($loop->first) class="active" @endif>
                                        <a href="#">{{ $key }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            &nbsp;
                            @include('lte::parts.entity-navigation', [
                               'next' => '#',
                               'previous' => '#',
                            ])
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover td-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th class="text-center">Publish</th>
                                    <th class="text-center">Actions</th>
                                    <th class="text-center">Actions2</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td class="text-center">
                                        <a href="#" target="_blank">
                                            <img src="/vendor/its-lte/img/no-avatar.png" class="thumbnail-50">
                                        </a>
                                        <p>{{ Str::random(7, 12) }}</p>
                                    </td>
                                    <td>11/07/2014</td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td>
                                        @include('lte::fields.field-checkbox-ajax', [
                                            //'label' => 'Статус',
                                            'field_name' => 'status['.$i.']',
                                            'raw_name' => 'status',
                                            //'format' => 'name|value',
                                            'status' => 0,
                                            'url' => route('lte.data.status'),
                                        ])
                                    </td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                    <td class="text-center">
                                        <i class="fa fa-check-square-o"></i>
                                    </td>
                                    <td class="text-center">
                                        @include('lte::parts.action-btn', [
                                            'show' => '#',
                                            'edit' => '#',
                                            'delete' => '#',
                                        ])
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="" class="btn btn-xs bg-purple"><i class="fa fa-copy"></i></a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" style="right: 0; left: unset;">
                                                    <li>
                                                        <a href="#" data-url="" class=" js-action-form" data-method="GET"><i class="fa fa-trash text-danger"></i> Delete</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-url="#" class="js-action-form" data-method="GET"><i class="fa fa-eye text-info"></i> Mailind</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        @include('lte::parts.pagination')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title">Checkbox, radio</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.field-checkbox', [
                            'label' => 'Статус',
                            'field_name' => 'status',
                            'status' => 0,
                        ])

                        @include('lte::fields.field-radio-group', [
                            'field_name' => 'Способ доставки',
                            'selected' => 1,
                            'attributes' => [1 => 'Самовывоз', 2 => 'Почта',]
                        ])
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title"> Date, time, color</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.field-text', [
                            'label' => 'Name',
                            'field_name' => 'name',
                            'value' => isset($name) ? $name : '',
                            'type' => 'text',
                            'placeholder' => 'Enter your name',
                        ])

                        @include('lte::fields.field-daterangepicker', [
                            'label' => 'Укажите период:',
                            'field_name' => 'range',
                            'field_name_start' => 'start_at',
                            'field_name_end' => 'end_at',
                            'date_start' => date('m/d/Y'),
                            'date_end' => date('m/d/Y'),
                            'format' => 'MM.DD.YYYY',
                            'show_saved' => true,
                        ])

                        @include('lte::fields.field-colorpicker', [
                            'label' => 'Цвет',
                            'field_name' => 'color',
                            'value' => '#35e61a',
                        ])

                        @include('lte::fields.field-datetimepicker', [
                             'label' => 'Дата и время создания',
                             'field_name' => 'created_at',
                             'value' => \Carbon\Carbon::now()->format('Y/m/d H:i:s'),
                         ])

                        @include('lte::fields.field-datepicker', [
                             'label' => 'Дата оформления',
                             'field_name' => 'confirmed_at',
                             'value' => \Carbon\Carbon::now()->format('d/m/Y'),
                         ])

                        @include('lte::fields.field-timepicker', [
                            'label' => 'Время созадния',
                            'field_name' => 'created_at',
                            'value' => \Carbon\Carbon::now()->format('H:i:s'),
                        ])
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title">Списки</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.field-linear-list', [
                           'label' => 'Пример линейного списка',
                           'field_name' => 'vars_json[countries]',
                           'placeholder_value' => 'Значение',
                           'items' => ['США', 'Франция', 'Англия',],
                        ])

                        @include('lte::fields.field-links', [
                           'label' => 'Пример списка',
                           'field_name' => 'delivery_method',
                           'key_key' => 'key',
                           'key_value' => 'value',
                           'placeholder_key' => 'Ключ',
                           'placeholder_value' => 'Значение',
                           'items' => [['key' => 0, 'value' => 'Самовывоз', 'safe' => 1], ['key' => 1, 'value' => 'Новая почта']]
                        ])
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title"> X-Editable</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">

                            @include('lte::fields.field-x-editable', [
                              'value' => 0,
                              'type' => 'select',
                              'field_name' => 'data[show]',
                              'source' => [["value" => "1", "text" => "Отображать"], ["value" => "0", "text" => "Скрывать"]],
                              'pk' => 13,
                              'url' => route('lte.data.status'),
                              'value_title' => 'Скрывать',
                            ])
                            |
                            @include('lte::fields.field-x-editable', [
                               'value' => 'Текст для редактирования X-Editable',
                               'type' => 'textarea',
                               'field_name' => 'data[message]',
                               'pk' => 14,
                               'url' => route('lte.data.status'),
                            ])

                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title"> Alerts, modals</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div>
                            <button type="button" class="btn btn-success js-alert" data-type="success">Success</button>
                            <button type="button" class="btn btn-info js-alert" data-type="info">Info</button>
                            <button type="button" class="btn btn-warning js-alert" data-type="warning">Warning</button>
                            <button type="button" class="btn btn-danger js-alert" data-type="error">Error (danger)</button>
                        </div>
                        <br>
                        <div>
                            <p><a href="https://github.com/CodeSeven/toastr" target="_blank">https://github.com/CodeSeven/toastr</a></p>
                            <p><a href="https://lipis.github.io/bootstrap-sweetalert/" target="_blank">https://lipis.github.io/bootstrap-sweetalert/</a></p>
                        </div>
                    </div>
                    <div class="box-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Modal</button>
                        <button type="button" class="btn btn-primary js-fill-modal" data-target="#myModal2" data-fields='{"firstname":"Eva","lastname":"Green"}'>Modal with json fills</button>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title"> Select</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">

                        @include('lte::fields.field-select2-static', [
                            'label' => 'Технология',
                            'field_name' => 'technology',
                            'multiple' => 1,
                            'max' => 2,
                            'disabled' => 0,
                            'required' => 1,
                            'attributes' => [1 => 'PHP', 2 => 'Laravel', 3 => 'JS', 4 => 'Vue'],
                            'selected' => [2,4],
                            'empty_value' => '--не выбрано--',
                        ])

                        @include('lte::fields.field-select2-ajax-autocomplete', [
                            'label' => 'Статус статьи',
                            'data_url' => route('lte.data.statuses'),
                            'field_name' => 'tags',
                            'multiple' => 1,
                            'disabled' => 0,
                            'selected' => [1 => 'Новый заказ',],
                            'old' => old('tags') // TODO OLD
                        ])

                        @include('lte::fields.field-select2-change-status-ajax', [
                            'label' => 'Публиковать',
                            'field_name' => 'is_publish',
                            'attributes' => ['yes' => 'Да', 'no' => 'Нет'],
                            'selected' => 'yes',
                            'empty_value' => '--не выбрано--',
                            'data_url' => route('lte.data.status'),
                        ])

                        @include('lte::fields.field-select2-tags', [
                            'label' => 'Теги',
                            'data_url' => route('lte.data.tags'),
                            'selected' => [1 => 'Новости'],
                            //'attributes' => [1 => 'Новости', 2 => 'Спорт', 3 => 'Политика'],
                            //'selected' => [2],
                            'field_name' => 'tags',
                            'separators' => "[';']",
                            'new_tag_label' => ' [NEW]',
                            'max' => 4,
                            'multiple' => 1,
                            'disabled' => 0,
                            'old' => old('tags'),
                            'help_text' => 'Укажите через знак запятой (,) теги'
                        ])

                        @include('lte::fields.field-select2-tree-ajax', [
                            'label' => 'Основная категория',
                            'field_name' => 'category_id',
                            'multiple' => 0,
                            'disabled' => 0,
                            'required' => 1,
                            'help_block' => '* Какая-то подсказка о поле',
                            'data_url_tree' => route('lte.data.treeselect'),
                        ])
                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title">Файлы</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.field-file-uploaded-simple',[
                            'label' => 'Простой файл',
                            'field_name' => 'file',
                            'path' => '',
                        ])

                        {{-- TODO: test --}}
                        @include('lte::fields.field-file-uploaded',[
                           'label' => 'Файл',
                           'field_name' => 'file',
                           'entity' => isset($menuItem) ? $menuItem : null,
                       ])
                        {{-- TODO: test --}}
                        @include('lte::fields.field-files-uploaded',[
                             'label' => 'Файлы',
                             'field_name' => 'files',
                             'entity' => isset($menuItem) ? $menuItem : null,
                        ])
                        {{-- TODO: test --}}
                        @include('lte::fields.field-files-uploaded-sortable',[
                             'label' => 'Файлы с сортировкой',
                             'field_name' => 'files',
                             'entity' => isset($menuItem) ? $menuItem : null,
                        ])
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title">Изображения</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.field-image-uploaded-simple',[
                            'label' => 'Простое изображение',
                            'field_name' => 'image',
                            'path' => isset($path) ? $path : null,
                        ])

                        @include('lte::fields.field-image-uploaded',[
                            'label' => 'Изображение',
                            'field_name' => 'image',
                            'entity' => isset($menuItem) ? $menuItem : null,
                        ])

                        @include('lte::fields.field-images-uploaded',[
                             'label' => 'Изображения',
                             'field_name' => 'images',
                             'entity' => isset($menuItem) ? $menuItem : null,
                        ])

                        @include('lte::fields.field-images-uploaded-sortable',[
                             'label' => 'Изображения с весом',
                             'field_name' => 'images',
                             'entity' => isset($menuItem) ? $menuItem : null,
                        ])
                    </div>
                </div>


                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title"> Древовидная структура</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.hierarchical.tree', [
                            //'terms' => $terms,
                            //'tree' => $tree,
                            'has_hierarchy' => 1,
                            'box_title' => 'Список терминов таксономии',
                            'entity_name' => 'term',
                            //'route_name_save_tree' => 'lte.terms.order',
                            //'route_name_edit' => 'lte.terms.edit',
                            //'route_name_create' => 'lte.terms.create',
                            //'route_name_show' => 'lte.menu-items.show',//TODO this
                            //'route_name_delete' => 'lte.terms.destroy',
                            'route_additional_attrs' => ['vocabulary' => 'colors'],
                        ])

                        <hr>

                        @include('lte::fields.field-treeview', [
                            'label' => 'Категории',
                            'field_name' => 'terms[categories]',
                            'url_tree' => route('lte.data.treeview'),
                        ])
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title">Textarea Full</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <textarea name="" rows="5" class="ck-editor ck-full"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title">Textarea Small</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <textarea name="" rows="5" class="ck-editor ck-small"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title">Textarea Mini</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <textarea name="" rows="5" class="ck-editor ck-mini"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var datetimepickerOptions = {
            format: 'Y/m/d H:i:s',
            inline:true,
            lang:'ru'
        };

        $('.js-alert').on('click', function () {
            var type = $(this).data('type');

            if (type) {
                toastr[type](type.toUpperCase() + ': Hello ITS developer!');
                swal(type.toUpperCase(), "You clicked the button!", type);
            } else {
                toastr.success('Hello ITS developer!');
                swal("Good job!", "You clicked the button!", "success");
            }
        });
    </script>
@endpush



@push('modals')
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    @include('lte::fields.field-text', [
                        'label' => 'First name',
                        'field_name' => 'firstname',
                    ])
                    @include('lte::fields.field-text', [
                        'label' => 'Last name',
                        'field_name' => 'lastname',
                        'field_id' => 'lastname'
                     ])

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endpush