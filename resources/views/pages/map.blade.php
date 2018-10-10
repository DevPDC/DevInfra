@extends('layouts.map')

@section('title','PhilRice Geo-Map')

@section('content')
<div id="philrice-map">
</div>

<div class="card" id="add-card">
    <div class="card-header">
        <h4 class="card-title dashboard-title">ADD NEW FACILITY</h4>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'facility.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
        <div class="row">
            <div class="col-md-12">
                {{ Form::text('name', '', ['class' => 'form-control', 'required' => '', 'placeholder' => 'Enter
                Name..']) }}
                {{ Form::text('coordinates', '', ['required' => '', 'id' => 'coordinates', 'hidden' => '']) }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <select name="infrastructure_id" class="form-control" required="">
                    @foreach ($infrastructures as $infra)
                    <option value="{{ $infra->id }}">{{ $infra->infra_name }} - {{ $infra->infra_abbr }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                {{ Form::textarea('details', '', ['class' => 'form-control','required' => '', 'resize' =>
                'false', 'rows' => '3', 'placeholder' => 'Enter Marker Details..']) }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                {{ Form::submit('Add New Facility', ['class' => 'btn btn-block btn-success btn-sm']) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="row">
    <div class="col-md-3" id="graph-wrapper">
        <div class="card" id="graph-card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <script>
                    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
                <a class="weatherwidget-io" href="https://forecast7.com/en/15d73120d87/science-city-of-munoz/"
                    data-label_1="MUÑOZ" data-label_2="NUEVA ECIJA" data-font="Trebuchet MS" data-icons="Climacons Animated"
                    data-shadow="#333333" data-textcolor="white" data-highcolor="#ff6806" data-lowcolor="#03fdfd">MUÑOZ
                    NUEVA ECIJA</a>
            </div>
        </div>
        {{-- Calendar/Schedule --}}
        <div class="card" id="graph-card" style="overflow:hidden;">
            <div class="card-header">
                <h4 class="card-title dashboard-title">@php echo date('F') @endphp SCHEDULES</h4>
            </div>
            <div class="card-body sched-card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible sched-bar">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4 class="sched-title">Water Tank 1</h4>
                            <p class="sched-body">INFO: Water Tank 1 must undergo regular maintenance on 2018-08-20.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible sched-bar">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4 class="sched-title">Main Building GenSet</h4>
                            <p class="sched-body">ALERT: MB GenSet exceeds the operating hours limit. Urgent service is
                                needed.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible sched-bar">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4 class="sched-title">Palayaman Water Tank</h4>
                            <p class="sched-body">WARNING: Palayamanan Water Tank is scheduled for maintenance 3 days
                                ago.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible sched-bar">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4 class="sched-title">North GenSet</h4>
                            <p class="sched-body">SUCCESS: North GenSet has been successfully renewed and maintained.</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-12" id="calendar"></div> --}}
            </div>
        </div>
        {{-- Graphs --}}
        {{-- <div class="card" id="graph-card">
            <div class="card-header">
                <button type="button" class="btn btn-card-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <h4 class="card-title dashboard-title">GRAPHS</h4>
            </div>
            <div class="card-body">
                <canvas id="pieChart" style="height:250px"></canvas>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="col-md-6">
    </div>
    <div class="col-md-3" id="graph-wrapper">
        {{-- Add New Facility --}}
        @auth
        @endauth
        {{-- Facilities Data Table Div --}}
        <div class="card" id="graph-card">
            <div class="card-header">
                <h4 class="card-title dashboard-title">FACILITIES</h4>
            </div>
            <div class="card-body">
                <div class="card" id="table-card">
                    <div class="card-body">
                        <table class="table table-condensed table-hover dashboard-table dataTable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Facility</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($facilities as $facility)
                                <tr>
                                    <td>{{ $facility->id }}</td>
                                    <td>{{ $facility->name }}</td>
                                    <td>{{ $facility->details }}</td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('addStyles')
    {{ Html::style('coreui/css/dataTables/css/dataTables.bootstrap4.css') }}
@endsection

@section('addScripts')
    <script src="{{ asset('coreui/js/dataTables.js') }}"></script>
    <script src="{{ asset('coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('coreui/js/dataTable-function.js') }}"></script>

@foreach($facilities as $facility)
    <script>
       var facilityid = {!! json_encode($facility->id) !!}
       var facilityname = {!! json_encode($facility->name) !!}
       var detail = {!! json_encode($facility->details) !!}
       console.log(facilityname);
          var js_geo = {!! json_encode($facility->coordinates) !!}
              console.log(js_geo.toString());
              var maps = L.geoJSON(JSON.parse(js_geo), {
                  onEachFeature: function (feature, layer){
                      layer.bindPopup('<div class="box" id="box-dashboard"><h3 class="box-title">'+facilityid+'. '+facilityname+'</h3><div class="box-body text-light"><label class="p-popup">'+detail+'</label></div></div>');

                      layer.on('mouseover', function (e){
                          this.openPopup();
                      });
                      layer.on('mouseout', function (e){
                          this.closePopup();
                      });
                      layer.on('click', function (e){
                      });
                  }
              }).addTo(map);
    </script>
@endforeach
    <script>
    $(document).ready(function(){
        // $('#dataTable').DataTable();
        $('#calendar').fullCalendar({
            theme: 'bootstrap4',
            header    : {
                left  : 'prev,next',
                right : 'today,month'
            },
            buttonText: {
                today: 'today',
                month: 'month'
            }
        });
    });
    </script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('serverSideFacilities') }}',
                columnDefs: [{
                    targets: [0, 1, 2]
                }]
            });
        });
    </script>
@endsection