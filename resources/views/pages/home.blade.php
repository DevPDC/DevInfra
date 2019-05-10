@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('title','Dashboard')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title')
<li class="breadcrumb-item">
    <a href="#">Dashboard</a>
</li>
@endsection
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
@section('content')
<div class="row">
    <div class="col-sm-6 col-lg-3 col-md-3">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                        <div class="btn-group float-right">
                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon-settings"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="text-value">9.823</div>
                        <div>Members online</div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                        <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                            class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas class="chart chartjs-render-monitor" id="card-chart1" height="70" style="display: block;"
                            width="354"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card text-white bg-info">
                    <div class="card-body pb-0">
                        <button class="btn btn-transparent p-0 float-right" type="button">
                            <i class="icon-location-pin"></i>
                        </button>
                        <div class="text-value">9.823</div>
                        <div>Members online</div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                        <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                            class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas class="chart chartjs-render-monitor" id="card-chart2" height="70" style="display: block;"
                            width="354"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                        <div class="btn-group float-right">
                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon-settings"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="text-value">9.823</div>
                        <div>Members online</div>
                    </div>
                    <div class="chart-wrapper mt-3" style="height:70px;">
                        <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                            class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas class="chart chartjs-render-monitor" id="card-chart3" height="70" style="display: block;"
                            width="386"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                        <div class="btn-group float-right">
                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icon-settings"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="text-value">9.823</div>
                        <div>Members online</div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                        <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                            class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas class="chart chartjs-render-monitor" id="card-chart4" height="70" style="display: block;"
                            width="354"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-header">Bar Chart
                <div class="card-header-actions">
                    <a class="card-header-action" href="http://www.chartjs.org" target="_blank">
                        <small class="text-muted">docs</small>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-wrapper">
                    <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                        class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <canvas id="canvas-2" style="display: block; width: 770px; height: 384px;" width="770" height="384"
                        class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- --------------- --}}
{{-- End Content Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
@section('addStyles')

@endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Scripts Section --}}
{{-- --------------- --}}
@section('addScripts')
{{ Html::script('public/coreui/js/charts/chart.min.js') }}
{{ Html::script('public/coreui/js/charts/custom-tooltip.min.js') }}
{{ Html::script('public/coreui/js/charts/chart-config.js') }}

<script>
    $(document).ready(function() {
        setInterval(function(){
            var barChart = new Chart($('#canvas-2'), {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Sample',
                        backgroundColor: 'rgba(220, 220, 220, 0.5)',
                        borderColor: 'rgba(220, 220, 220, 0.8)',
                        highlightFill: 'rgba(220, 220, 220, 0.75)',
                        highlightStroke: 'rgba(220, 220, 220, 1)',
                        data: [random(), random(), random(), random(), random(), random(), random()]
                    }, {
                        backgroundColor: 'rgba(151, 187, 205, 0.5)',
                        borderColor: 'rgba(151, 187, 205, 0.8)',
                        highlightFill: 'rgba(151, 187, 205, 0.75)',
                        highlightStroke: 'rgba(151, 187, 205, 1)',
                        data: [random(), random(), random(), random(), random(), random(), random()]
                    }]
                },
                options: {
                responsive: true
                }
            }); // eslint-disable-next-line no-unused-vars
        }, 5000);
    })
</script>
@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}