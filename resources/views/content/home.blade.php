@extends('lte::layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12"><h4>{{ trans('lte::main.Total') }}:</h4></div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $totals['new_orders'] ?? 0 }}</h3>
                        <p>New orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $totals['success_orders'] ?? 0 }}</h3>

                        <p>Success orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $totals['clients'] ?? 0 }}</h3>

                        <p>Clients</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $totals['new_web_forms'] ?? 0 }}</h3>

                        <p>New Web-forms</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-social-chrome"></i>
                    </div>
                    <a href="#" class="small-box-footer"> <i class="fa"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12"><h4>{{ trans('lte::main.Today') }}:</h4></div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Registrations</span>
                        <span class="info-box-number"><a href="#">{{ $todays['registers'] ?? 0 }}</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Subscribers</span>
                        <span class="info-box-number"><a href="#">{{ $todays['subscribers'] ?? 0 }}</a></span>
                    </div>
                </div>
            </div>

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-recycle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Payments</span>
                        <span class="info-box-number"><a href="#">{{ $todays['autopayments'] ?? 0 }}</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-fuchsia"><i class="fa fa-meh-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Out of subscriptions</span>
                        <span class="info-box-number"><a href="#">{{ $todays['stop_subscribes'] ?? 0 }}</a></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-line-chart"></i>
                        <h3 class="box-title">Dynamics of orders for 30 days</h3>
                    </div>
                    <div class="box-body">
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <i class="fa fa-shopping-cart"></i><h3 class="box-title">Last 15 orders</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('lte::main.Sum') }}</th>
                                    <th>{{ trans('lte::main.Status') }}</th>
                                    <th>{{ trans('lte::main.Products') }}</th>
                                    <th>{{ trans('lte::main.Creation') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>$234.00</td>
                                        <td>
                                            <span class="label label-success">New</span>
                                        </td>
                                        <td>5 [3]</td>
                                        <td>2019.11.29 22:27:34</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>$420.00</td>
                                        <td>
                                            <span class="label label-danger">Cancel</span>
                                        </td>
                                        <td>2 [2]</td>
                                        <td>2019.12.03 21:17:31</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">UTM-source</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="pie-utm-source" width="800" height="450"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">UTM-medium</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="pie-utm-medium" width="800" height="450"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bar UTM-source</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="bar-utm-source" width="760" height="325"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- TODO: PHP arrays - charts data for example --}}
@php
    $chartData = [
        'data' => [
            ['y' => '2020-01', 'new' => 2666, 'success' => 2432],
            ['y' => '2020-02', 'new' => 3263, 'success' => 3121],
            ['y' => '2020-03', 'new' => 1234, 'success' => 1122],
            ['y' => '2020-04', 'new' => 3421, 'success' => 3312],
            ['y' =>'2020-05', 'new' => 6810, 'success' => 1914],
            ['y' =>'2020-06', 'new' => 5670, 'success' => 4293],
            ['y' =>'2020-07', 'new' => 4820, 'success' => 3795],
            ['y' =>'2020-08', 'new' => 15073, 'success' => 15073],
            ['y' =>'2020-09', 'new' => 10687, 'success' => 4460],
            ['y' =>'2020-10', 'new' => 8432, 'success' => 5713],
            ['y' =>'2020-11', 'new' => 8432, 'success' => 5713],
            ['y' =>'2020-12', 'new' => 8432, 'success' => 571],
        ],
        'labels' => ['New', 'Success'],
        'colors' => ['#00c0ef', '#00a65a'],
    ];

    $utmSource = [
        ["label" => "Africa", "value" => 2478, 'color' => '#e34a12'],
        ["label" => "Asia", "value" => 5435, 'color' => '#af3267'],
        ["label" => "Europe", "value" => 2111, 'color' => '#d32126'],
        ["label" => "Latin America", "value" => 6755, 'color' => '#124356'],
        ["label" => "North America", "value" => 433, 'color' => '#aaff22'],
    ];

    $utmMedium = [
        ["label" => "Telegram", "value" => 342, 'color' => '#ddaaff'],
        ["label" => "Instagram", "value" => 4321, 'color' => '#436612'],
        ["label" => "Google", "value" => 5678, 'color' => '#c3c3c3'],
        ["label" => "Facebook", "value" => 23, 'color' => '#acdb12'],
        ["label" => "Twitter", "value" => 342, 'color' => '#643212'],
    ];
@endphp

@push('scripts')
    <script>

        // http://morrisjs.github.io/morris.js/
        if ($('#revenue-chart').length) {
            var chartOrders = @json($chartData ?? []),
                area = new Morris.Area({
                    element: 'revenue-chart',
                    resize: true,
                    data: chartOrders.data || [
                        {y: '2012-01', new: 2666, success: 2666},
                    ],
                    xkey: 'y',
                    ykeys: ['new', 'success'],
                    labels: chartOrders.labels || ['New', 'Success'],
                    lineColors: chartOrders.colors || ['#00c0ef', '#00a65a'],
                    hideHover: 'auto'
                 });
        }

        var options = {
            responsive: true,
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        // https://www.chartjs.org/
        new Chart(document.getElementById("pie-utm-source"), {
            type: 'doughnut',
            data: {
                labels: @json(array_column($utmSource, 'label')),//["Africa", "Asia", "Europe", "Latin America", "North America"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: @json(array_column($utmSource, 'color')),
                    data: @json(array_column($utmSource, 'value'))//[2478,5267,734,784,433]
                }]
            },
            options: options
        });
        new Chart(document.getElementById("pie-utm-medium"), {
            type: 'doughnut',
            data: {
                labels: @json(array_column($utmMedium, 'label')),
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: @json(array_column($utmMedium, 'color')),
                    data: @json(array_column($utmMedium, 'value'))
                }]
            },
            options: options
        });

        new Chart(document.getElementById("bar-utm-source"), {
            type: 'bar',
            data: {
                labels: @json(array_column($utmSource, 'label')),//["Africa", "Asia", "Europe", "Latin America", "North America"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: @json(array_column($utmSource, 'color')),
                    data: @json(array_column($utmSource, 'value'))//[2478,5267,734,784,433]
                }]
            },
            options: options
        });

    </script>
@endpush