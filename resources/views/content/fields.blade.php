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
                        <table class="table table-hover">
                            <tbody class="v-middle">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th style="text-align: center">Publish</th>
                                <th>Reason</th>
                                <th>Actions</th>
                            </tr>
                            @for($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td class="text-center">
                                        <a href="#" target="_blank"><img src="/vendor/its-lte/img/no-avatar.png" alt="" style="height: 100px; border-radius: 50%"></a>
                                        <p>{{ Str::random(5) . ' ' . Str::random(4, 8) }}</p>
                                    </td>
                                    <td>11-7-2014</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td style="text-align: center">
                                        <i class="fa fa-check-square-o"></i>
                                    </td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td class="text-center">
                                        @include('lte::parts.action-btn', [
                                            'show' => '#',
                                            'edit' => '#',
                                            'delete' => '#',
                                        ])
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
                                <h3 class="box-title">Флажки, radio</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.field-checkbox', [
                            'label' => 'Статус',
                            'field_name' => 'status',
                            'status' => 0,
                        ])

                        @include('lte::fields.field-checkbox-ajax', [
                            'label' => 'Статус',
                            'field_name' => 'status_ajax',
                            'status' => 0,
                            'url' => '#'
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
                                <h3 class="box-title"> Текст, Время, дата, цвет</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.field-text', [
                            'label' => 'Имя',
                            'field_name' => 'name',
                            'value' => isset($name) ? $name : '',
                            'type' => 'text',
                            'placeholder' => 'Введите ваше имя',
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
                          'url' => '#',
                      ])

                        @include('lte::fields.field-x-editable', [
                           'value' => '[Текст X-Editable]',
                           'type' => 'textarea',
                           'field_name' => 'data[message]',
                           'pk' => 14,
                           'url' => '#',
                        ])
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

                        @include('lte::fields.field-select2-ajax-autocomplete', [
                            'label' => 'Теги статьи',
                            'data_url' => route('lte.data.statuses'),
                            'field_name' => 'tags',
                            'multiple' => 1,
                            'disabled' => 0,
                            'selected' => [1 => 'Новый заказ',],
                            'old' => old('tags') // TODO OLD
                        ])

                        @include('lte::fields.field-select2-change-status-ajax', [
                           'selected' => 2,
                           'attributes' => [1 => 'Новый заказ', 2 => 'Обработан', 3 => 'В обработке'],
                           'data_url' => route('lte.data.statuses'),
                        ])

                        @include('lte::fields.field-select2-static', [
                            'label' => 'Теги',
                            'field_name' => 'values[]',
                            'multiple' => 1,
                            'max' => 2,
                            'disabled' => 0,
                            'required' => 1,
                            'attributes' => [1 => 'PHP', 2 => 'Laravel', 3 => 'JS', 4 => 'Vue'],
                            'selected' => [2,4],
                            'empty_value' => '--не указано--',
                        ])

                        @include('lte::fields.field-select2-tree-ajax', [
                            'label' => 'Основная категория',
                            'field_name' => 'category_id',
                            'multiple' => 1,
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

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Modal</button>

    </section>
@endsection

@push('scripts')
    <script>
        // https://github.com/CodeSeven/toastr
        toastr.success('Hello ITS developer!')

        // https://lipis.github.io/bootstrap-sweetalert/
        swal("Good job!", "You clicked the button!", "success")
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
@endpush