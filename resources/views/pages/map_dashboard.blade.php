@extends('layouts.map')

@section('title','PhilRice Geo-Map')


{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title')
    <li class="breadcrumb-item">
        <a href="#">Geographic Map</a> 
    </li>
@endsection
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}

@section('content')
    <div class="card" id="weather-card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <script>
                        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
                    <a class="weatherwidget-io" href="https://forecast7.com/en/15d73120d87/science-city-of-munoz/"
                        data-label_1="MUÑOZ" data-label_2="NUEVA ECIJA" data-font="Trebuchet MS" data-icons="Climacons Animated"
                        data-shadow="#333333" data-textcolor="white" data-highcolor="#ff6806" data-lowcolor="#03fdfd">MUÑOZ
                        NUEVA ECIJA</a>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->role->role_id === 1 
    || Auth::user()->role->role_id === 2 
    || Auth::user()->role->role_id === 3
    || Auth::user()->role->role_id === 1000)
        <div class="card" id="add-card">
            <div class="card-header">
                <a data-toggle="collapse" href="#add" aria-expanded="true" aria-controls="collapseOne"><h5 class="dashboard-title">ADD NEW FACILITY</h5></a>
            </div>
            <div class="collapse" id="add" role="tabpanel" aria-labelledby="headingOne" data-parent="#add-card" style="">
                <div class="card-body">
                    {!! Form::open(['route' => 'facility.store', 'method' => 'POST', 'data-parsley-validate' => '', 'id' => 'addNewFacilityForm']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::text('name', '', ['class' => 'form-control', 'required' => '', 'placeholder' => 'Name of Facility..','id' => 'facilityName']) }}
                            {{ Form::text('coordinates', '', ['required' => '', 'id' => 'coordinates', 'hidden' => '']) }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <select name="infrastructure_id" class="form-control" required="" id="infrastructureId">
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
                            'false', 'rows' => '3', 'placeholder' => 'Enter Marker Details..','id' => 'facilityDetails']) }}
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
        </div>
    @endif
            {{-- Calendar/Schedule --}}
            {{-- <div class="card" id="graph-card" style="overflow:hidden;">
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
                    <div class="col-md-12" id="calendar"></div>
                </div>
            </div> --}}
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
            {{-- Add New Facility --}}
            @auth
            @endauth
            {{-- Facilities Data Table Div --}}

            

            <div class="card dataBase" id="database-card">
                <div class="card-header">
                    <a data-toggle="collapse" href="#tableFacilities" aria-expanded="true" aria-controls="collapseOne"><h5 class="dashboard-title">FACILITIES</h5></a>
                </div>
                <div class="collapse show" id="tableFacilities" role="tabpanel" aria-labelledby="headingOne" data-parent="#database-card" style="">
                    <div class="card-body">
                        <div class="card" id="table-card">
                            <div class="card-body">
                                <input type="text" class="form-control" id="ftrInput" hidden>
                                <table class="table table-condensed table-hover dashboard-table dataTable" id="dashboard-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Facility</th>
                                            <th>Details</th>
                                            <th>Actions</th>
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
            <div class="card" id="filter-card">
                <div class="card-header">
                    <a data-toggle="collapse" href="#filters" aria-expanded="true" aria-controls="collapseOne"><h5 class="dashboard-title">FILTERS</h5></a>
                </div>
                <div class="collapse show" id="filters" role="tabpanel" aria-labelledby="headingOne" data-parent="#filter-card" style="">
                    <div class="card-body">
                        {{-- @foreach($infrastructures as $infrastructure)
                            <button class="btn btn-dark btn-block btn-md" type="button" id="infra{{$infrastructure->id}}">{{ $infrastructure->infra_name }}</button>
                        @endforeach --}}
                        <form class="form">
                            <div class="inputGroup">
                                <input id="radio0" name="fltInfrastructure" type="radio" value='ALL' checked/>
                                <label for="radio0">All Facilities</label>
                            </div>
                            <div class="inputGroup">
                                <input id="radio1" name="fltInfrastructure" type="radio" value='1' onclick="checkEvent(this)"/>
                                <label for="radio1"><i class="fa fa-tint"></i> Water Tank</label>
                            </div>
                            <div class="inputGroup">
                                <input id="radio2" name="fltInfrastructure" type="radio" value='2'/>
                                <label for="radio2"><i class="fa fa-grip-lines-vertical"></i> Water Canal</label>
                            </div>
                            <div class="inputGroup">
                                <input id="radio3" name="fltInfrastructure" type="radio" value='3'/>
                                <label for="radio3"><i class="fa fa-product-hunt"></i> Water Pump</label>
                            </div>
                            <div class="inputGroup">
                                <input id="radio4" name="fltInfrastructure" type="radio" value='4' onclick="checkEvent(this)"/>
                                <label for="radio4"><i class="fa fa-bolt"></i> Generator Set</label>
                            </div>
                            <div class="inputGroup">
                                <input id="radio5" name="fltInfrastructure" type="radio" value='5'/>
                                <label for="radio5"><i class="fa fa-grip-lines-vertical"></i> Drainage</label>
                            </div>
                            <div class="inputGroup">
                                <input id="radio6" name="fltInfrastructure" type="radio" value='6'/>
                                <label for="radio6"><i class="fa fa-building"></i> Building</label>
                            </div>
                            <div class="inputGroup">
                                <input id="radio7" name="fltInfrastructure" type="radio" value='7'/>
                                <label for="radio7"><i class="fa fa-tree"></i> Trees</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<div id="philrice-map">
</div>

@endsection

@section('addStyles')
    {{ Html::style('public/coreui/css/dataTables/css/dataTables.bootstrap4.css') }}
    {{ Html::style('public/coreui/js/bootstrap-daterangepicker/css/daterangepicker.min.css') }}
    {{ Html::style('public/coreui/css/select2/select2.min.css') }}
    
    @if(Auth::user()->role->role_id === 1 
        || Auth::user()->role->role_id === 2 
        || Auth::user()->role->role_id === 3
        || Auth::user()->role->role_id === 1000)

        <style>
            #database-card
            {
                top:20%;
                left:1.5%;
            }
        </style>
    @else
        <style>
            #database-card
            {
                top:12%;
                right:1.5%;
            }
        </style>
    @endif
    <style>
        .btn-view
        {
            border-radius: 100% !important
        }

        #deleteFacility
        {
            top: 15%
        }
    </style>
@endsection

@section('addScripts')
    {{ Html::script('public/plugins/datetimepicker/jquery.datetimepicker.full.min.js') }}
    {{ Html::script('public/coreui/js/moment/js/moment.min.js') }}
    <script src="{{ asset('public/coreui/js/dataTables.js') }}"></script>
    <script src="{{ asset('public/coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('public/coreui/js/dataTable-function.js') }}"></script>
    {{ Html::script('public/coreui/js/select2/js/select2.full.min.js') }}
    
    {{-- <script>
        $(document).ready(function(){
            var facilities = {!! json_encode($facilities) !!};
            var allFacilities = [],
                generators = [],
                watertanks = [],
                waterpumps = [],
                watercanals = [],
                drainages = [],
                trees = [],
                buildings = [];

            // console.log(facilities);

            for(i=0; i<facilities.length; i++)
            {   
                var fid = facilities[i].id,
                    name = facilities[i].name,
                    detail = facilities[i].details,
                    type = facilities[i].infrastructure_id,
                    geo = facilities[i].coordinates;

                console.log(fid);
                if(type == 1) {

                    watertanks.push(facilities[i]);


                } else if(type == 4) {

                    generators.push(facilities[i]);
                    
                }
            }
            for(i=0; i<=watertanks.length; i++)
            {
                // var geoWatertanks = L.geoJson(watertanks);
                        // console.log(geoWatertanks);
                var geoWatertanks = L.geoJson(watertanks[i],{
                    pointToLayer: function(feature, latlng) {
                        return L.marker(latlng,{});
                    }
                });
            }
        });
    </script> --}}

    @include('partials._filter-functions')
    @include('partials._add-spec-category')
    @include('partials._add-properties')
    @include('partials._add-genset-operation')
    @include('partials._delete-facility')

<script>
    function gensetProgress(id)
    {
        $.ajax({
            method: 'post',
            url: "{{ route('api/getPercentageOfGenset') }}",
            data: {
                gensetid: id
            },
            success: function(res) {
                console.log(res);
                var per0 = $('#per-0'),
                    per10 = $('#per-10'),
                    per20 = $('#per-20'),
                    per30 = $('#per-30'),
                    per40 = $('#per-40'),
                    per50 = $('#per-50'), 
                    per60 = $('#per-60'),
                    per70 = $('#per-70'),
                    per80 = $('#per-80'),
                    per90 = $('#per-90'),
                    per100 = $('#per-100');

                if(res < 10)
                {
                    per0.addClass('is-active');
                    per0.removeClass('is-complete');
                    
                    per10.removeClass('is-active is-complete');
                    per20.removeClass('is-active is-complete');
                    per30.removeClass('is-active is-complete');
                    per40.removeClass('is-active is-complete');
                    per50.removeClass('is-active is-complete');
                    per60.removeClass('is-active is-complete');
                    per70.removeClass('is-active is-complete');
                    per80.removeClass('is-active is-complete');
                    per90.removeClass('is-active is-complete');
                    per100.removeClass('is-active is-complete');

                } else if(res >= 10 && res < 20) {
                    per0.addClass('is-complete');
                    per0.removeClass('is-active');
                    
                    per10.addClass('is-active');
                    per10.removeClass('is-complete');

                    per20.removeClass('is-active is-complete');
                    per30.removeClass('is-active is-complete');
                    per40.removeClass('is-active is-complete');
                    per50.removeClass('is-active is-complete');
                    per60.removeClass('is-active is-complete');
                    per70.removeClass('is-active is-complete');
                    per80.removeClass('is-active is-complete');
                    per90.removeClass('is-active is-complete');
                    per100.removeClass('is-active is-complete');
                } else if(res >= 20 && res < 30) {
                    per0.addClass('is-complete');
                    per0.removeClass('is-active');
                    
                    per10.addClass('is-complete');
                    per10.removeClass('is-active');

                    per20.addClass('is-active');
                    per20.removeClass('is-complete');

                    per30.removeClass('is-active is-complete');
                    per40.removeClass('is-active is-complete');
                    per50.removeClass('is-active is-complete');
                    per60.removeClass('is-active is-complete');
                    per70.removeClass('is-active is-complete');
                    per80.removeClass('is-active is-complete');
                    per90.removeClass('is-active is-complete');
                    per100.removeClass('is-active is-complete');

                } else if(res >= 30 && res < 40) {
                    per0.addClass('is-complete');
                    per0.removeClass('is-active');
                    
                    per10.addClass('is-complete');
                    per10.removeClass('is-active');

                    per20.addClass('is-complete');
                    per20.removeClass('is-active');

                    per30.addClass('is-active');
                    per30.removeClass('is-complete');

                    per40.removeClass('is-active is-complete');
                    per50.removeClass('is-active is-complete');
                    per60.removeClass('is-active is-complete');
                    per70.removeClass('is-active is-complete');
                    per80.removeClass('is-active is-complete');
                    per90.removeClass('is-active is-complete');
                    per100.removeClass('is-active is-complete');

                } else if(res >= 40 && res < 50) {
                    per0.addClass('is-complete');
                    per0.removeClass('is-active');
                    
                    per10.addClass('is-complete');
                    per10.removeClass('is-active');

                    per20.addClass('is-complete');
                    per20.removeClass('is-active');

                    per30.addClass('is-complete');
                    per30.removeClass('is-active');

                    per40.addClass('is-active');
                    per40.removeClass('is-complete');

                    per50.removeClass('is-active is-complete');
                    per60.removeClass('is-active is-complete');
                    per70.removeClass('is-active is-complete');
                    per80.removeClass('is-active is-complete');
                    per90.removeClass('is-active is-complete');
                    per100.removeClass('is-active is-complete');

                } else if(res >= 50 && res < 60) {
                    per0.addClass('is-complete');
                    per0.removeClass('is-active');
                    
                    per10.addClass('is-complete');
                    per10.removeClass('is-active');

                    per20.addClass('is-complete');
                    per20.removeClass('is-active');

                    per30.addClass('is-complete');
                    per30.removeClass('is-active');

                    per40.addClass('is-complete');
                    per40.removeClass('is-active');

                    per50.addClass('is-active');
                    per50.removeClass('is-complete');

                    per60.removeClass('is-active is-complete');
                    per70.removeClass('is-active is-complete');
                    per80.removeClass('is-active is-complete');
                    per90.removeClass('is-active is-complete');
                    per100.removeClass('is-active is-complete');

                } else if(res >= 60 && res < 70) {
                    per0.addClass('is-complete');
                    per0.removeClass('is-active');
                    
                    per10.addClass('is-complete');
                    per10.removeClass('is-active');

                    per20.addClass('is-complete');
                    per20.removeClass('is-active');

                    per30.addClass('is-complete');
                    per30.removeClass('is-active');

                    per40.addClass('is-complete');
                    per40.removeClass('is-active');

                    per50.addClass('is-complete');
                    per50.removeClass('is-active');

                    per60.addClass('is-active');
                    per60.removeClass('is-complete');

                    per70.removeClass('is-active is-complete');
                    per80.removeClass('is-active is-complete');
                    per90.removeClass('is-active is-complete');
                    per100.removeClass('is-active is-complete');

                } else if(res >= 70 && res < 80) {
                    per0.addClass('is-complete');
                    per0.removeClass('is-active');
                    
                    per10.addClass('is-complete');
                    per10.removeClass('is-active');

                    per20.addClass('is-complete');
                    per20.removeClass('is-active');

                    per30.addClass('is-complete');
                    per30.removeClass('is-active');

                    per40.addClass('is-complete');
                    per40.removeClass('is-active');

                    per50.addClass('is-complete');
                    per50.removeClass('is-active');

                    per60.addClass('is-complete');
                    per60.removeClass('is-active');

                    per70.addClass('is-active');
                    per70.removeClass('is-complete');

                    per80.removeClass('is-active is-complete');
                    per90.removeClass('is-active is-complete');
                    per100.removeClass('is-active is-complete');

                } else if(res >= 80 && res < 90) {
                    per0.addClass('is-complete');
                    per0.removeClass('is-active');
                    
                    per10.addClass('is-complete');
                    per10.removeClass('is-active');

                    per20.addClass('is-complete');
                    per20.removeClass('is-active');

                    per30.addClass('is-complete');
                    per30.removeClass('is-active');

                    per40.addClass('is-complete');
                    per40.removeClass('is-active');

                    per50.addClass('is-complete');
                    per50.removeClass('is-active');

                    per60.addClass('is-complete');
                    per60.removeClass('is-active');

                    per70.addClass('is-complete');
                    per70.removeClass('is-active');


                    per80.addClass('is-active');
                    per80.removeClass('is-complete');

                    per90.removeClass('is-active is-complete');
                    per100.removeClass('is-active is-complete');

                } else if(res >= 90 && res < 100) {
                    per0.addClass('is-complete');
                    per0.removeClass('is-active');
                    
                    per10.addClass('is-complete');
                    per10.removeClass('is-active');

                    per20.addClass('is-complete');
                    per20.removeClass('is-active');

                    per30.addClass('is-complete');
                    per30.removeClass('is-active');

                    per40.addClass('is-complete');
                    per40.removeClass('is-active');

                    per50.addClass('is-complete');
                    per50.removeClass('is-active');

                    per60.addClass('is-complete');
                    per60.removeClass('is-active');

                    per70.addClass('is-complete');
                    per70.removeClass('is-active');

                    per80.addClass('is-complete');
                    per80.removeClass('is-active');

                    per90.addClass('is-active');
                    per90.removeClass('is-complete');

                    per100.removeClass('is-active is-complete');

                } else if(res >= 100) {
                    per0.addClass('is-complete');
                    per0.removeClass('is-active');
                    
                    per10.addClass('is-complete');
                    per10.removeClass('is-active');

                    per20.addClass('is-complete');
                    per20.removeClass('is-active');

                    per30.addClass('is-complete');
                    per30.removeClass('is-active');

                    per40.addClass('is-complete');
                    per40.removeClass('is-active');

                    per50.addClass('is-complete');
                    per50.removeClass('is-active');

                    per60.addClass('is-complete');
                    per60.removeClass('is-active');

                    per70.addClass('is-complete');
                    per70.removeClass('is-active');

                    per80.addClass('is-complete');
                    per80.removeClass('is-active');

                    per90.addClass('is-complete');
                    per90.removeClass('is-active');

                    per100.addClass('is-active');
                    per100.removeClass('is-complete');
                }
            }
        });
    };

    $(document).ready(function() {

        $('#addNewFacilityForm').on('submit', function(e)
        {
            e.preventDefault();

            var name = $('#facilityName'),
            coor = $('#coordinates'),
            infra = $('#infrastructureId'),
            details = $('#facilityDetails');

            $.ajax({
                method: 'post',
                url: '{{ route('api/insertNewFacility') }}',
                data: {
                    name: name,
                    infrastructure_id: infra,
                    coordinates: coor,
                    details: details
                },
                success: function(res)
                {
                    Swal.fire(
                        'Submitted!',
                        'New Facility has been added! ',
                        'success'
                    );

                    name.val() = '';
                    coor.val() = '';
                    infra.val() = '';
                    details.val() = '';
                },
                error: function(x)
                {
                    console.log(x.responseText);
                }
            })
        });

        $('#addOperationButton').click(function(){
            var addForm = $("#addOperationHours");

            addForm.submit();
        });

        $('#date_of_operation_end').addClass('readonly');

        $('#date_of_operation_start').datetimepicker({
	        format:'Y-m-d H:i:s'
        });
        $('#date_of_operation_end').datetimepicker({
            format:'Y-m-d H:i:s'
        });

        $('#date_of_operation_start').on('change', function() {
            if($(this).val() != null) {
                $('#date_of_operation_end').removeClass('readonly');
            } else {
                $('#date_of_operation_end').addClass('readonly');
            }
        });

        $('#date_of_operation_end').on('change', function(){
            var startText = $('#date_of_operation_start').val(),
                endText = $('#date_of_operation_end').val(),
                hourText = $('#hours_operated'),
                start = new Date(startText),
                end = new Date(endText);

            if(start != null)
            {
                // end - start returns difference in milliseconds   
                var hourdiff = new Date(end - start);

                // get hours
                var hours = hourdiff/1000/60/60;
                console.log(hours);

                hourText.val(hours);
            }
        });

        $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('serverSideFacilities') }}',
            columnDefs: [{
                targets: [0, 1, 2]
            }],
            pageLength: 5
        });
    });
</script>

<script>
    $(".select2-properties").select2({
        ajax: {
            type: 'GET',
            dataType: 'JSON',
            url: "{{ route('api/getFacilityProperties') }}",
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.property_category_name + ' - ' + item.property_category_abbr
                        }
                    })
                };
            }
        }
    });

    $('button#btnSubmitForm').click( function() {
        $('form#formAddProperties').submit();
    });
</script>

<script>

    function getSpecs()
    {
        var facilityid = $('#add_facility_id').val();
        var divSpecs = $("#facility_specification");
        divSpecs.empty();

        $.ajax({
            url: "{{ route('api/getFacilitySpecifications') }}",
            dataType: 'json',
            method: 'post',
            data: {
                facilityid: facilityid
            },
            success: function(data)
            {
                var innerText = '';
                // console.log(data[0].property_category_name);
                if(data.length == 0)
                {
                    innerText +='No Specs Found';
                }
                else
                {
                    for(i=0; i<data.length; i++)
                    {
                        innerText += '<div class="row"><div class="col-md-6 col-sm-6">'+data[i].property_category_name+'</div><div class="col-md-6 col-sm-6">'+data[i].property_value+'</div></div>';
                        // console.log(innerText);
                    }
                }
                divSpecs.append(innerText);
            }
        });
    };

    function produceGensetButton()
    {
        var gensetWrapper = $('#addGensetOperationButton'),
            gensetInputId = $('#genset_facility_id'),
            faciId = $('#add_facility_id').val();

        if($('#category_input').val() == 'Generator Set')
        {
            gensetWrapper.removeProp('hidden');
            gensetInputId.val(faciId);   
        }
        else
        {
            gensetWrapper.prop('hidden');
        }
    };

    $('#specRefresh').click(function()
    {
        getSpecs();
    });

    $('#addSpecCategory').click(function(){
        var addSpecModal = $('#addSpecModal');
        var divSpecs = $("#addFacilityProperties");

        divSpecs.modal('hide');
        addSpecModal.modal('show');
        $('#dataTable-specs').DataTable().destroy();

        $('#dataTable-specs').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("api/getFacilityPropertiesDatable") }}'
            }
        });
    }); 

    $('#addGensetOperationButton').click(function(){
        var gensetModal = $('#addGensetOperation'),
            propertyModal = $('#addFacilityProperties'),
            gensetId = $('#add_facility_id').val(),
            gensetInputId = $('.genset_facility_id'),
            genCapWrapper = $('#generator_capacity');

        if($('#category_input').val() == 'Generator Set')
        {
            gensetInputId.val(gensetId);
            propertyModal.modal('hide');
            gensetModal.modal('show');
            
        } else {
            alert('This facility is not categorized as "Generator Set"!');
        }
    });

    $('#addGensetOperation').on('show',function(){
        var gensId = $('#genset_facility_id').val(),
            capacityWrapper = $('#generator_capacity');
        
        $.ajax({
            url: '{{ route("api/getGeneratorCapacity") }}',
            data: {
                gensetid:gensId
            },
            success: function(e){
                alert(e.length);
                if(e == null)
                {
                    capacityWrapper.text(e.capacity_max)
                }
            },
            error: function(){
                alert(e.length);
            }
        });
    });

</script>

<script>

    $('#addGensetOperation').on('shown.bs.modal', function() {
        var genId = $("#genset_facility_id"),
            genId2 = $("#genset_facility_id-2"),
            genCapWrapper = $('#generator_capacity'),
            genCapWrapper2 = $('#gen-setcap-wrapper'),
            currOpt = $('#current_operation_hours'),
            totOpt = $('#total_operation_hours');

        $.ajax({
            url: '{{ route('api/getGeneratorCapacity') }}',
            dataType: 'json',
            data: {
                gensetid: genId.val()
            },
            success: function(res) {
                if(res[0] != null)
                {
                    console.log(res[0].capacity_max);
                    genCapWrapper.html(res[0].capacity_max);
                    // genCapWrapper2.prop('hidden');
                } else {
                    // alert('no'); 
                    $('#genCapacityForm').html('<div class="card"><div class="card-body"><label for="" class="text-red">No Data Found</label><input type="text" id="genset_facility_id-2" class="genset_facility_id form-control" name="genset_facility_id" value="'+genId.val()+'" hidden><div class="input-group"><input type="text" name="capacity_max" id="capacity_max" class="form-control" placeholder="Generator Capacity (hours)"><span class="input-group-append"><button class="btn btn-sm btn-primary" type="submit" id="genCapacityButton"><i class="fa fa-check"></i> Submit</button></span></div></div></div>');
                    // genCapWrapper2.removeProp('hidden');
                    // genId2.val($genId);
                }
            }
        });

        $.ajax({
            method: 'post',
            url: '{{ route('api/getTotalOperationHours') }}',
            data: {
                gensetid: genId.val()
            },
            success: function(res) {
                if(res != null)
                {
                    totOpt.text(res);
                    // genCapWrapper2.prop('hidden');
                } else {
                    // alert('no'); 
                    totOpt.text('0');
                    // genCapWrapper2.removeProp('hidden');
                    // genId2.val($genId);
                }
            }
        });

        $.ajax({
            method: 'post',
            url: '{{ route('api/getCurrentOperationHours') }}',
            data: {
                gensetid: genId.val()
            },
            success: function(res) {
                if(res[0] != null)
                {
                    currOpt.text(res);
                    // genCapWrapper2.prop('hidden');
                } else {
                    // alert('no'); 
                    currOpt.text('0');
                    // genCapWrapper2.removeProp('hidden');
                    // genId2.val($genId);
                }
            }
        });
    });

    // Generator Capacity Setting
    $('#genCapacityForm').on('submit',function(e) {
        e.preventDefault();

        $.ajax({
            method: 'post',
            url: '{{ route('api/storeGeneratorCapacity') }}',
            data: {
                genset_facility_id: $('#genset_facility_id-2').val(),
                capacity_max: $('#capacity_max').val()
            },
            success:function(res)
            {
                var capacityWrapper = $('#generator_capacity'); 

                if(res != null)
                {
                    // $('#deleteFacility').modal('hide');
                    Swal.fire(
                        'Submitted!',
                        'Maximum operation hours has been set!',
                        'success'
                    );
                    capacityWrapper.text(res);
                }
            }
            
        })
    });

    // Modifiying Generator Capacity
    $('#modifyGensetCapacity').on('submit',function(e) {
        e.preventDefault();

        $.ajax({
            method: 'post',
            url: '{{ route('api/modifyGeneratorCapacity') }}',
            data: {
                genset_facility_id: $('#genset_facility_id').val(),
                capacity_max: $('#capacity_max_modify').val()
            },
            success:function(res)
            {
                if(res != null)
                {
                    var capacityWrapper = $('#generator_capacity'),
                        editForm = $('#capacityEditForm'); 

                    $('#capacityEditForm').hide();

                    // $('#deleteFacility').modal('hide');
                    Swal.fire(
                        'Modified!',
                        'Maximum Operation Hours has been modified!',
                        'success'
                    );
                    capacityWrapper.text(res);
                }
            }
        })
    });

    $('#closeDeleteModal').click(function() {
        $('#deleteFacility').modal('hide');
        $('#addFacilityProperties').modal('show');
    });

    $('#editCapacityButton').click(function() {
        var editWrapper = $('#capacityEditForm'),
            genId = $("#genset_facility_id");
        
        editWrapper.removeAttr('hidden');

        $('#modifyGensetid').val(genId.val());
    });

    $("#setCapacityButton").click(function() {
        var genCapWrapper = $('#gen-setcap-wrapper');

        genCapWrapper.attr('hidden','false');
    });

    $('#addGensetOperation').on('shown.bs.modal', function(){
        var id = $('#genset_facility_id').val(),
            opTable = $('#operationDatatable');

            opTable.attr('hidden','');

            opTable.DataTable().clear();
            opTable.DataTable().destroy();

            gensetProgress(id);

    });

    $('#viewOperationButton').click(function(){
        var genid = $('#genset_facility_id').val(),
            opTable = $('#operationDatatable');

            opTable.removeAttr('hidden');
            opTable.DataTable().destroy();

            opTable.DataTable({
                serverSide: true,
                ajax: {
                    url: '{{ route("api/getGensetOperation") }}',
                    method: 'post',
                    data: {
                        id: genid,
                        token:'{{ csrf_token() }}'
                    }
                },
                order: [[ 0, 'desc' ]],
                pageLength: 5
            });
    });

    $('#viewAllOperationButton').click(function(){
        var genid = $('#genset_facility_id').val(),
            opTable = $('#operationDatatable');

            opTable.removeAttr('hidden');
            opTable.DataTable().destroy();

            opTable.DataTable({
                serverSide: true,
                ajax: {
                    url: '{{ route("api/getGensetAllOperation") }}',
                    method: 'post',
                    data: {
                        id: genid,
                        token:'{{ csrf_token() }}'
                    }
                },
                order: [[ 0, 'desc' ]],
                pageLength: 5
            });
    });

    $('#resetCurrent').click(function() {
        var genId = $('#genset_facility_id').val(),
            currOpt = $('#current_operation_hours');

        $.ajax({
            url: "{{ route('api/revertCurrentOperation') }}",
            method: 'post',
            data: {
                gensetid: genId
            },
            success: function(res){
                console.log(res);
                if(res != null)
                {
                    currOpt.text(res);
                } else {
                    currOpt.text('0');
                }
            }
        })
    });

    $('#btnDeleteFacility').click(function() {
        var delModal = $('#deleteFacility'),
            facId = $('#add_facility_id').val(),
            facInp = $('#delete_facility_id'),
            facProp = $('#addFacilityProperties');
        // alert(facId);
        facProp.modal('hide');
        delModal.modal('show');
        facInp.val(facId);
    });

    $('#frmDeleteFacility').on('submit', function(e) {
        e.preventDefault();
        var id = $('#delete_facility_id').val();

        $.ajax({
            method: 'post',
            url: '{{ route('api/delFacility') }}',
            data: {
                id: id
            },
            success:function(res)
            {
                if(res == 'success')
                {
                    $('#deleteFacility').modal('hide');
                    Swal.fire(
                        'Facility has been removed!!',
                        'Reload the page to view changes!',
                        'success'
                    );
                }
            }
            
        })
    });

    

    
    // var modifyForm = $('#modifyCapacityForm');

    // modifyForm.submit(function(event){
    // // Set username variable
    //     var gensetid = $('#gensetid').val(),
    //         capacity = $('#capacity_max').val(); 
        
    //     // Check if username value set
    //     if ( $.trim(gensetid) != '' ) {
    //         // Process AJAX request
    //         $.post("{{ route('gencapacity.update',"+gensetid+") }}", {gensetid: gensetid, capacity_max: capacity}, function(data){
    //         // Append data into #results div
    //         // $('#results').html(data);
    //         });
    //     }
        
    //     // Prevent default form action
    //     event.preventDefault();
    // });

</script>

@endsection