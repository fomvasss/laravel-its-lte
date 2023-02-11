@extends('lte::layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Example entries</h3>

                        <div class="box-tools pull-right">

                            <div class="btn-group" data-toggle="btn-toggle">
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fa fa-file-pdf-o"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fa fa-file-excel-o"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-sm">
                                    <i class="fa fa-print"></i>
                                </button>
                            </div>

                            <div class="btn-group">
                                <ul class="pagination pagination-sm inline">
                                    @foreach(['ES' => 'Spanish', 'EN' => 'English', 'UA' => 'Ukrainian'] as $key => $locale)
                                        <li @if($loop->first) class="active" @endif>
                                            <a href="#">{{ $key }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            &nbsp;</div>

                            @include('lte::parts.entity-navigation', [
                               'next' => '#',
                               'current' => '#',
                               'previous' => '#',
                            ])
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover td-middle sortable-table" data-url="{{ route('lte.data.status') }}" style="position: relative;">
                            <thead>
                                <tr>
                                    <th style="width: 35px"></th>
                                    <th>#</th>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Progress</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Payment</th>
                                    <th>Default</th>
                                    <th class="text-center">Publish</th>
                                    <th class="text-center" style="min-width: 85px;">Actions</th>
                                    <th class="text-center" style="min-width: 70px">Actions2</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--
                                <tr class="odd">
                                    <td colspan="10" class="text-center">{{ trans('lte::main.No records found') }}</td>
                                </tr>
                                --}}
                                @for($i = 1; $i <= 4; $i++)
                                    @php($progress = rand(1,100))
                                <tr data-id="n{{$i}}">
                                    <td><i class="fa fa-arrows"></i></td>
                                    <td>{{ $i }}</td>
                                    <td class="wh-center">
                                        <a href="#" target="_blank">
                                            <img src="/vendor/its-lte/img/no-image.png" class="thumbnail-100">
                                        </a>
                                        <span class="node-row-title">
                                            <a href="/vendor/its-lte/img/no-image.png">
                                                Perspiciatis Aperiam <i class="fa fa-pencil"></i>
                                            </a>
                                        </span>
                                    </td>
                                    <td><a href="#" class="hover-edit">13.01.1989</a></td>
                                    <td>
                                        <div class="progress-group">
                                            <span class="progress-text">Completed</span>
                                            <span class="progress-number"><b>{{ $progress }}</b>/100</span>

                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-aqua" style="width: {{$progress}}%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td>
                                        @include('lte::fields.field-checkbox-ajax', [
                                            'field_name' => 'status['.$i.']',
                                            'raw_name' => 'status',
                                            'status' => $i % 2,
                                            'url' => route('lte.data.status'),
                                        ])
                                    </td>
                                    <td>
                                        <span class="js-num-format">{{ pow($i*10, $i) }}</span>
                                    </td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                    <td>
                                        <input class="js-action-change radio"
                                        type="radio"
                                        {{--data-url="{{ route('lte.data.statuses') }}"--}}
                                        name="default[{{ $i }}]"
                                        value="{{ $i }}"
                                        @if($i == 2) checked @endif
                                        id="default-{{ $i }}"
                                        >
                                        <label for="default-{{ $i }}"></label>
                                    </td>
                                    <td class="text-center">
                                        <i class="fa fa-check-square-o"></i>
                                    </td>
                                    <td class="wh-center btn-media">
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
                                                        <a href="#" data-url="" class=" js-action-form" data-method="GET" data-confirm="{{ trans('lte::main.Delete') }}?"><i class="fa fa-trash text-danger"></i> Delete</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-url="#" class="js-action-form" data-method="GET"><i class="fa fa-envelope text-info"></i> Mailing</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-url="#" class="js-action-form" data-method="GET"><i class="fa fa-print text-aqua"></i> Print</a>
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
                        <div class="pull-left">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="margin: 20px 0;" class="form-inline">
                                        <label>
                                            {{ trans('lte::main.Show') }}
                                            <select name="" class="form-control input-sm">
                                                <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="100">5000</option>
                                            </select>
                                            {{ trans('lte::main.entries') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('lte::parts.pagination')
                        <div class="pull-right">
                            <div class="pagination-wrapper text-center">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                            <span class="page-link" aria-hidden="true">‹</span>
                                        </li>
                                        <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                        <li class="page-item"><a class="page-link" href="#page=2">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#page=3">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#page=2" rel="next" aria-label="Next »">›</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
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
                            'label' => 'Status',
                            'field_name' => 'status',
                            'status' => 0,
                        ])

                        @include('lte::fields.field-radio-group', [
                            'field_name' => 'Delivery method',
                            'selected' => 1,
                            'attributes' => [1 => 'Pickup', 2 => 'Postman',]
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

                        @include('lte::fields.field-url', [
                            'label' => 'URL',
                            'field_name' => 'url',
                            //'entity' => isset($banner) ? $banner : null,
                            'value' => isset($post) ? $post->url : '',
                        ])

                        @include('lte::fields.field-slug', [
                            'label' => 'Slug',
                            'field_name' => 'slug',
                            'entity' => isset($page) ? $page : '',
                            //'value' => 'page-already-slug', // optional
                            'placeholder' => 'Entered slug',
                        ])

                        @include('lte::fields.field-daterangepicker', [
                            'label' => 'Date range:',
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
                             'label' => 'Date and time of creation',
                             'field_name' => 'created_at',
                             'value' => \Carbon\Carbon::now()->format('Y/m/d H:i:s'),
                         ])

                        @include('lte::fields.field-datepicker', [
                             'label' => 'Date of registration',
                             'field_name' => 'confirmed_at',
                             'value' => \Carbon\Carbon::now()->format('d/m/Y'),
                         ])

                        @include('lte::fields.field-timepicker', [
                            'label' => 'Time of creation',
                            'field_name' => 'created_at',
                            'value' => \Carbon\Carbon::now()->format('H:i:s'),
                        ])
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title">Lists</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.field-linear-list', [
                           'label' => 'Linear list example',
                           'field_name' => 'vars_json[countries]',
                           'placeholder_value' => 'Value',
                           'items' => ['USA', 'Ukraine', 'Germany',],
                        ])

                        @include('lte::fields.field-links', [
                           'label' => 'List example',
                           'field_name' => 'delivery_method',
                           'key_key' => 'key',
                           'key_value' => 'value',
                           'placeholder_key' => 'Sume Key',
                           'placeholder_value' => 'Some Value',
                           'items' => [['key' => 0, 'value' => 'Pickup', 'safe' => 1], ['key' => 1, 'value' => 'Postman']]
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
                              'source' => [["value" => "1", "text" => "Show"], ["value" => "0", "text" => "Hide"]],
                              'pk' => 13,
                              'url' => route('lte.data.status'),
                              'value_title' => 'Hide',
                            ])
                            |
                            @include('lte::fields.field-x-editable', [
                               'value' => 'Text to edit X-Editable',
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
                        <button type="button" class="btn btn-primary js-modal-fill-html" data-target="#modal-sm-wrap" data-url={{ route('lte.data.modal-content') }}>SM Modal with AJAX content</button>
                        <button type="button" class="btn btn-primary js-modal-fill-html" data-target="#modal-wrap" data-url={{ route('lte.data.modal-content') }}>Modal with AJAX content</button>
                        <button type="button" class="btn btn-primary js-modal-fill-html" data-target="#modal-lg-wrap" data-url={{ route('lte.data.modal-content') }}>LG Modal with AJAX content</button>
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
                            'label' => 'Technology',
                            'field_name' => 'technology',
                            'multiple' => 1,
                            'max' => 2,
                            'disabled' => 0,
                            'required' => 1,
                            'attributes' => [12 => 'PHP', 23 => 'Laravel', 34 => 'JS', 45 => 'Vue', 56 => 'NodeJS'],
                            'selected' => [12,34],
                            'empty_value' => '--not chosen--',
                            'data_url_save' => route('lte.data.status'),
                        ])

                        @include('lte::fields.field-select2-ajax-autocomplete', [
                            'label' => 'Article status',
                            'data_url' => route('lte.data.statuses'),
                            'field_name' => 'tags',
                            'multiple' => 1,
                            'disabled' => 0,
                            'selected' => [1 => 'New order',],
                            'old' => old('tags') // TODO OLD
                        ])

                        @include('lte::fields.field-select2-change-status-ajax', [
                            'label' => 'Publish',
                            'field_name' => 'is_publish',
                            'attributes' => ['yes' => 'Yes', 'no' => 'No'],
                            'selected' => 'yes',
                            'empty_value' => '--not chosen--',
                            'data_url' => route('lte.data.status'),
                        ])

                        @include('lte::fields.field-select2-tags', [
                            'label' => 'Tags',
                            'data_url' => route('lte.data.tags'),
                            'selected' => [1 => 'News'],
                            //'attributes' => [1 => 'Новости', 2 => 'Спорт', 3 => 'Политика'],
                            //'selected' => [2],
                            'field_name' => 'tags',
                            'separators' => "[';']",
                            'new_tag_label' => ' [NEW]',
                            'max' => 4,
                            'multiple' => 1,
                            'disabled' => 0,
                            'old' => old('tags'),
                            'help_text' => trans('lte::main.* Enter tags, separating them , or ;'),
                        ])

                        @include('lte::fields.field-select2-tree-ajax', [
                            'label' => 'Main category',
                            'field_name' => 'category_id',
                            'multiple' => 0,
                            'disabled' => 0,
                            'required' => 1,
                            'help_block' => '* Some kind of clue about the field',
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
                                <h3 class="box-title">Files</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.field-file-uploaded-simple',[
                            'label' => 'Simple file',
                            'field_name' => 'file',
                            'path' => '',
                        ])

                        {{-- TODO: test --}}
                        @include('lte::fields.field-file-uploaded',[
                           'label' => 'File',
                           'field_name' => 'file',
                           'entity' => isset($menuItem) ? $menuItem : null,
                       ])
                        {{-- TODO: test --}}
                        @include('lte::fields.field-files-uploaded',[
                             'label' => 'Files',
                             'field_name' => 'files',
                             'entity' => isset($menuItem) ? $menuItem : null,
                        ])
                        {{-- TODO: test --}}
                        @include('lte::fields.field-files-uploaded-sortable',[
                             'label' => 'Sorted files',
                             'field_name' => 'files',
                             'entity' => isset($menuItem) ? $menuItem : null,
                        ])
                    </div>
                </div>

                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title">Images</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.field-image-uploaded-simple',[
                            'label' => 'Simple image',
                            'field_name' => 'image',
                            'path' => isset($path) ? $path : null,
                        ])

                        @include('lte::fields.field-image-uploaded',[
                            'label' => 'Image',
                            'field_name' => 'image',
                            'entity' => isset($menuItem) ? $menuItem : null,
                        ])

                        @include('lte::fields.field-images-uploaded',[
                             'label' => 'Images',
                             'field_name' => 'images',
                             'entity' => isset($menuItem) ? $menuItem : null,
                        ])

                        @include('lte::fields.field-images-uploaded-sortable',[
                             'label' => 'Sorted images',
                             'field_name' => 'images',
                             'entity' => isset($menuItem) ? $menuItem : null,
                        ])
                    </div>
                </div>


                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title"> Tree structure</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        @include('lte::fields.hierarchical.tree', [
                            //'terms' => $terms,
                            //'tree' => $tree,
                            'has_hierarchy' => 1,
                            'box_title' => 'List of taxonomy terms',
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
                            'label' => 'Categories',
                            'field_name' => 'terms[categories]',
                            'url_tree' => route('lte.data.treeview'),
                        ])
                    </div>
                </div>


                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title"> Image cropper</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">

                        @include('lte::fields.field-image-cropper-uploaded',[
                              'label' => 'Crop Image',
                              'field_name' => 'image_pr',
                              'img_width' => 300,
                              'img_height' => 240,
                              'show_preview' => true,
                              'entity' => isset($post) ? $post : null,
                          ])

                    </div>
                </div>


                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="box-title"> Select blocks</h3>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">

                        @include('lte::fields.field-select2-static', [
                            'label' => 'Mailer',
                            'field_name' => 'vars_array[mail][mailer]',
                            'attributes' => ['smtp' => 'SMTP', 'sendmail' => 'Sendmail', 'log' => 'Log'],
                            'selected' => 'log',
                            'empty_value' => trans('lte::main.--not chosen--'),
                            'class' => 'js-select-blocks',
                            'data_attrs' => [
                                'map' => [
                                    'smtp' => ['.js-block-smtp'],
                                    'sendmail' => ['.js-block-sendmail'],
                                    'log' => ['.js-block-log'],
                                ],
                            ],
                        ])

                        <div class="js-block-smtp"><h2>SMTP</h2></div>
                        <div class="js-block-sendmail"><h2>SENDMAIL</h2></div>
                        <div class="js-block-log"><h2>LOG</h2></div>

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
