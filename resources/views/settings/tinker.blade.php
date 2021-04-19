@extends('lte::layouts.app')

@section('content')

    @include('lte::layouts.inc.content-header', [
       'page_title' => trans('lte::main.Console'),
       'small_page_title' => 'WEB-Tinker',
    ])

    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <iframe src="/control/tinker" frameborder="0" width="100%"  style="border: 0;height: calc(100vh - 0px);"></iframe>
                
            </div>
        </div>
    </section>
@stop