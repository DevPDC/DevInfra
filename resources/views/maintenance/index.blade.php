@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
    @section('title','Facilities Maintenance')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title')
    <li class="breadcrumb-item">
        <a href="#">Facilities Maintenance</a>
    </li>
@endsection
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
    @section('content')
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div id="calendar"></div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <i class="cui-building"></i>Maintenance Scheduler Form
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'maintenance.store', 'method' => 'POST']) !!}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Scope of Maintenance</strong>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div id="single-div">
                                                <input type="radio" class="toggle toggle-left" name="classification" id="single" value="single">
                                                <label for="single" class="btn">Individual Facility</label>
                                                <input type="radio" class="toggle toggle-right" name="classification" id="group" value="group">
                                                <label for="group" class="btn">Entire Class of Facility</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Details of Maintenance</strong>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12"></div>
                                        <div class="col-md-6 col-sm-12">
                                            {{ Form::label('maintenance_type','Maintenance Type') }}
                                            <select name="maintenance_type" id="maintenance_type" class="form-control">
                                                @foreach($schedulecategories as $schedcategory)
                                                    <option value="{{ $schedcategory->id }}">{{ $schedcategory->schedule_category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            {{ Form::label('maintenance_schedule','Maintenance Date') }}
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                                <input type="text" name="maintenance_schedule" required id="maintenance_schedule" class="form-control" placeholder="format: YYYY-MM-DD">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            {{ Form::label('maintenance_duration','Duration (yrs):') }}
                                            <input type="text" name="maintenance_duration" id="maintenance_duration" class="form-control" placeholder="No. of years">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <select name="scope[]" class="form-control" id="select2" multiple="multiple" style="width:100%; color:black !important">

                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
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
        {{ Html::style('public/custom/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
        {{ Html::style('public/coreui/css/select2/select2.min.css') }}
        {{ Html::style('public/custom/jquery/jquery-ui.theme.min.css') }}
        {{ Html::style('public/coreui/css/fullcalendar/css/fullcalendar.min.css') }}
    @endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Scripts Section --}}
{{-- --------------- --}}
    @section('addScripts')
        {{ Html::script('public/coreui/js/jQuery/js/jquery.maskedinput.js') }}
        {{ Html::script('public/custom/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
        {{ Html::script('public/coreui/js/select2/js/select2.full.min.js') }}
        {{ Html::script('public/coreui/js/moment/js/moment.min.js') }}
        {{ Html::script('public/coreui/js/fullcalendar/js/fullcalendar.min.js') }}
        {{ Html::script('public/coreui/js/fullcalendar/js/gcal.js') }}
        {{ Html::script('public/custom/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
        {{ Html::script('public/coreui/js/calendar.js') }}
        <script>
            $(document).ready(function(){
                $('#select2').hide();

                $('#calendar').fullCalendar({
                    header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                    },
                    defaultDate: new Date(),
                    editable: true,
                    themeButtonIcons: {
                        prev: 'circle-triangle-w',
                        next: 'circle-triangle-e',
                        prevYear: 'seek-prev',
                        nextYear: 'seek-next'
                    },
                    // allow "more" link when too many events
                    events: '{{ route('AllScheduledFacilityMaintenance') }}'
                });
                // End For Calendar

                // Date picker Initialization
                $('#maintenance_schedule').datepicker({
                    format: 'yyyy-mm-dd',
                    setDate: new Date(),
                    autoclose: true
                });
                $('input[name=classification]').change(function(){
                    if($('input[name=classification]:checked').val() == 'single')
                    {
                        $('#select2').show();
                        $('#select2').select2({
                            multiple: 'multiple',
                            ajax: {
                            type: 'GET',
                            dataType: 'JSON',
                            url: "{{ route('allFacilitiesInSelect2') }}",
                            processResults: function (data) {
                                    return {
                                        results: $.map(data, function (item) {
                                            return {
                                                text: item.name,
                                                id: item.id
                                            }
                                        })
                                    };
                                }
                            },
                        });
                        
                    }
                    else if($('input[name=classification]:checked').val() == 'group')
                    {
                        $('#select2').show();
                        $('#select2').select2({
                            multiple: 'multiple',
                            ajax: {
                            type: 'GET',
                            dataType: 'JSON',
                            url: "{{ route('allFacilitiesCategoryInSelect2') }}",
                            processResults: function (data) {
                                    return {
                                        results: $.map(data, function (item) {
                                            return {
                                                text: item.infra_name,
                                                id: item.id
                                            }
                                        })
                                    };
                                }
                            },
                        });
                    }
                })
            })
        </script>
    @endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}