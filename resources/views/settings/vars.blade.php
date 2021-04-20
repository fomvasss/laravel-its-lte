@extends('lte::layouts.app')

@section('content')

    @include('lte::layouts.inc.content-header', [
       'page_title' => trans('lte::main.Variables'),
    ])

    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <form action="#" method="POST">
                    @csrf
                    <input type="hidden" name="destination" value="{{ Request::fullUrl() }}">
                    <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ trans('lte::main.Total') }}: 3 </h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th style="width: 20%">Key</th>
                                <th style="width: 75%">Value</th>
                            </tr>
                            <tr>
                                <td>183</td>
                                <td>name</td>
                                <td>
                                    @include('lte::fields.field-x-editable', [
                                      'value' => 'Bacon Ipsum',
                                      'type' => 'textarea',
                                      'field_name' => 'data[message]',
                                      'pk' => 14,
                                      'url' => route('lte.data.status'),
                                   ])
                                </td>
                            </tr>
                            <tr>
                                <td>219</td>
                                <td>description</td>
                                <td>
                                    @include('lte::fields.field-text', [
                                        'field_name' => 'description',
                                        'value' => 'Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.',
                                        'type' => 'textarea',
                                        'rows' => 1,
                                    ])
                                </td>
                            </tr>
                            <tr>
                                <td>175</td>
                                <td>date</td>
                                <td>11-7-2014</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        @include('lte::fields.field-form-buttons')
                    </div>
                </div>
                </form>

            </div>
        </div>
    </section>
@stop