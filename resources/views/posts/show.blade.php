@extends('layouts.app')

{{-- *********************************************************************** --}}

{{-- Title Section --}}
{{-- --------------- --}}
@section('title',"$selectedpost->id")
{{-- --------------- --}}
{{-- --------------- --}}

{{-- *********************************************************************** --}}

{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title')
    <li class="breadcrumb-item">
        Service Requests
    </li>
    <li class="breadcrumb-item">
        <a href="#">{{ $selectedpost->id }}</a>
    </li>
@endsection
{{-- --------------- --}}
{{-- --------------- --}}

{{-- *********************************************************************** --}}

{{-- Additional Styles Section --}}
{{-- --------------- --}}
@section('addStyles')
{{ Html::style('public/coreui/css/dataTables/css/dataTables.bootstrap4.css') }}
{{ Html::style('public/coreui/css/select2/select2.min.css') }}
{{ Html::style('public/css/radio-style.css') }}
@endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}

{{-- *********************************************************************** --}}

{{-- Content Section --}}
{{-- --------------- --}}
@section('content')

<div class="row">
    <div class="col-md-7 col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                {{-- Tab List --}}
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#request_details" role="tab" aria-controls="home"
                            aria-selected="false"> Request Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#inspection" role="tab" aria-controls="profile"
                            aria-selected="false"> Ocular Inspection </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#service_details" role="tab" aria-controls="profile"
                            aria-selected="false"> Service Details </a>
                    </li>
                </ul>
                {{-- ------------ --}}
                {{-- Tab Content --}}
                <div class="tab-content">
                    {{-- 1st Tab --}}
                    <div class="tab-pane active show" id="request_details" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                {{-- Card Details --}}
                                <div class="card">
                                    <div class="card-header" id="form-wrapper">
                                        <div class="form-header">
                                            <input type="text" id="post_id" class="form-control" value="{{ $selectedpost->id }}" hidden>
                                            <i class="fa fa-info-circle"></i> Details of Request
                                        </div>
                                        <div class="form-subheader">
                                            Status: <span id="statusWrapper"></span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="highlight-teal">
                                                            <div class="highlight-header text-white">
                                                                <small>Submitted Date:</small><br>
                                                                <i class="fa fa-calendar"></i> {{ date("M d, Y",strtotime($selectedpost->created_at)) }}
                                                            </div>
                                                        </div>
                                                        <div class="pull-right highlight-header" style="background: white !important; width: 100% !important">
                                                            <small>Proposed Service Date:</small><br>
                                                            <i class="fa fa-calendar"></i> 
                                                            @if($selectedpost->proposed_service_date !== null)
                                                                {{ date("M d,Y",strtotime($selectedpost->proposed_service_date)) }}
                                                            @else
                                                                Not Specified
                                                            @endif
                                                        </div>
                                                        <div class="receiver-wrapper"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="list-group list-group-unbordered" id="detail-wrapper">
                                                    <div class="info-item">
                                                        <span class="info-subject">Ticket No:</span>
                                                        <input type='text' class="form-control" id="ticket-wrapper" readonly>
                                                        <label style="font-size: 11px; color: red">Note: Ticket No. will be automatically generated upon updating the status to <label style="font-weight: bold; letter-spacing: 2px">'Received'</label>.</label>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="list-group list-group-unbordered" id="detail-wrapper">
                                                    <div class="info-item">
                                                        <span class="info-subject">Requested By:</span>
                                                        <div class="input-group">
                                                        <input type="text" class="form-control" readonly id="requester" value="{{ App\Profile::select('emp_fullname')->where('emp_idno', $selectedpost->emp_idno)->first()->emp_fullname }}">
                                                            <div class="input-group-append">
                                                                @php
                                                                    if($selectedpost->user_id != null && $selectedpost->emp_idno == null)
                                                                    {
                                                                        $userid = $selectedpost->user_id;
                                                                    } else if($selectedpost->emp_idno != null && $selectedpost->user_id == null) {
                                                                        $userid = $selectedpost->emp_idno;
                                                                    }
                                                                @endphp
                                                                <a href="{{ route('profile.show',$userid) }}">
                                                                    <button class="btn btn-dark" type="button" id="button-search"><i class="fa fa-eye"></i> Profile</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                {{-- <div class="info-item">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-6">
                                                            <span class="info-subject">Service Request #</span>
                                                        </div>
                                                        <div class="col-md-8 col-sm-6">
                                                            <span class="info-detail">{{ $selectedpost->id }}</span>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="list-group list-group-unbordered" id="detail-wrapper">
                                                    <div class="info-item">
                                                        <span class="info-subject">Service Category</span>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" readonly value="{{ $selectedpost->category->category_name }}">
                                                            <div class="input-group-append">
                                                                <a href="{{ route('category.show', $selectedpost->category_id) }}">
                                                                    <button class="btn btn-dark" type="button" id="button-search"><i class="fa fa-eye"></i> {{ $selectedpost->category->category_abbr }}</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-md-8 col-sm-12">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="jumbotron jumbotron-fluid">
                                                        <div class="highlight-teal">
                                                            <div class="highlight-header text-white">
                                                                <small>Request Title:</small><br>
                                                                <i class="fa fa-info-circle"></i> {{ $selectedpost->request_title }}
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="highlight-header">
                                                            <small>Details:</small>
                                                        </div>
                                                        <div class="card-body indented-text">{{ $selectedpost->request_details }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4 col-sm-6">
                                                @if($selectedpost->user_id === Auth::user()->user_idno)
                                                <a href="#changeStatus" class="btn-sm btn btn-primary btn-block" data-toggle="modal">
                                                    <i class="fas fa-file-pdf"></i> Print Report
                                                </a>
                                                @endif
                                                @if(Auth::user()->role->role_id === 1
                                                || Auth::user()->role->role_id === 2
                                                || Auth::user()->role->role_id === 3
                                                || Auth::user()->role->role_id === 4
                                                || Auth::user()->role->role_id === 5
                                                || Auth::user()->role->role_id === 6
                                                || Auth::user()->role->role_id === 1000)
                                                <a href="#denyRequestModal" class="btn-sm btn btn-danger btn-block" data-toggle="modal"><i class="fa fa-trash"></i>
                                                    Deny Request
                                                </a>
                                                <a href="#changeStatus" class="btn-sm btn btn-success btn-block" data-toggle="modal"><i class="fa fa-edit"></i>
                                                    Update Status
                                                </a>
                                                <button type="button" id="printServiceReport" class="btn btn-sm btn-primary btn-block">
                                                    <i class="fa fa-file-pdf-o"></i> Export to PDF
                                                </button>
                                                {{-- <a href="{{ route('pdfServiceReport') }}"></a> --}}
                                                <form action="{{ route('pdfServiceReport') }}" method="post" id="PDFForm" target="_blank">
                                                    {{ csrf_field() }}
                                                    <input type="text" value="{{ $selectedpost->id }}" name="postid" hidden>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End 1st Tab --}}
                {{-- 2nd Tab --}}
                <div class="tab-pane" id="inspection" role="tabpanel">
                        <div class="container-fluid" id="content-wrapper">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <div class="jumbotron jumbotron-fluid">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="highlight-teal" style="text-align: center">
                                                    <div class="info-item">
                                                        <span class="info-subject text-white">Date of Service:</span>
                                                        <hr>
                                                        <a class="info-detail" id="date-ins"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="highlight-teal" style="text-align: center">
                                                    <div class="info-item">
                                                        <span class="info-subject text-white">Load Point/s</span>
                                                        <hr>
                                                        <a class="info-detail" id="load-ins"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="highlight-header">
                                            <i class="fa fa-check"></i> Inspection Details
                                        </div>
                                        <div class="card-body">
                                            <span id="details-ins" class="indented-text"></span>
                                        </div>
                                        <div class="highlight-header">
                                            <i class="fa fa-check"></i> Recommendation
                                        </div>
                                        <div class="card-body">
                                            <span id="recommendation-ins" class="indented-text"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <table class="table table-hover table-stripe dataTable-supplies" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Supply Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 col-sm-12"></div>
                            <div class="col-md-3 col-sm-12">
                                {{-- Check Inspection if it contains null value --}}
                                @if($inspection === null)
                                @if(Auth::user()->role->role_id === 1 ||
                                    Auth::user()->role->role_id === 2 ||
                                    Auth::user()->role->role_id === 3 ||
                                    Auth::user()->role->role_id === 1000)
                                <span id="editInspectionWrapper"></span>
                                <a href="#addOcularInspection" class="btn-sm btn btn-primary btn-block" data-toggle="modal">
                                    <i class="fa fa-edit"></i> Add Inspection Details
                                </a>
                                @endif
                                {{-- Else --}}
                                @else
                                @if(Auth::user()->role->role_id === 1 ||
                                    Auth::user()->role->role_id === 2 ||
                                    Auth::user()->role->role_id === 3 ||
                                    Auth::user()->role->role_id === 1000)
                                <button href="#addOcularInspection" class="btn-sm btn btn-dark btn-block" disabled data-toggle="modal"><i
                                        class="fa fa-edit"></i> Add Inspection Details</button>
                                @endif
                                @endif
                                {{-- End If --}}
                            </div>
                        </div>
                    </div>
                    {{-- End 2nd Tab --}}
    
                    {{-- 3rd Tab --}}
                    <div class="tab-pane" id="service_details" role="tabpanel">
                        <div class="container-fluid" id="content-wrapper">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="jumbotron jumbotron-fluid">
                                        <span class="highlight-header">
                                            Assigned Technician/s
                                        </span>
                                        <div class="card-body" id="assignedTechnician">
                                            {{-- @if($assignedtech->emp_idno === null) --}}
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 text-center">
                                                    <ul class="list-group list-group-unbordered" id="technicianNames"></ul>
                                                </div>
                                            </div>
                                            {{-- @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong><i class="cui-wrench"></i>Evaluation</strong>
                                        </div>
                                        <div class="card-body">
                                            @foreach($evaluations as $eval)
                                            <div class="card evaluation-card">
                                                <div class="card-body">
                                                    @if($eval->evaluation_title !== null)
                                                    <span class="evaluation-title">
                                                        {{-- <strong>{{$eval->evaluation_title}}</strong> --}}
                                                    </span>
                                                    @else
                                                    <span class="evaluation-title" style="color:red; font-style:italic">
                                                        <strong>
                                                            No Title
                                                        </strong>
                                                    </span>
                                                    @endif
                                                    <span class="pull-right evaluation-rate">
                                                        {{-- {{ $eval->rating->rating_name }} --}}
                                                    </span>
                                                    <br>
                                                    <span class="evaluation-body">{{ $eval->evaluation_body }}</span>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <span class="pull-right">
                                                                {{ App\Profile::select('emp_fullname')->where('emp_idno',$eval->user_id)->first()->emp_fullname }}
                                                            </span>
                                                            <br>
                                                            {{-- <span class="pull-right"><small>{{ $eval->created_at }}</small></span> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            @endforeach
                                            {{-- @if($selectedpost->user_id === Auth::user()->user_idno &&
                                            $selectedpost->status_id === 8) --}}
                                            {{-- @if($evaluation === null) --}}
                                            {{-- {{ dd($haseval->count()) }} --}}
                                            @if($haseval->count() === 0)
                                            <a href="#addEvaluation" data-toggle="modal" class="btn btn-primary btn-block btn-sm">Evaluate</a>
                                            @else
                                            {{-- <a href="#addEvaluation" data-toggle="modal" class="btn btn-primary btn-block btn-sm"
                                                disabled='true'>Evaluate</a> --}}
                                            @endif
                                            {{-- @endif --}}
                                            {{-- @endif --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3 col-sm-12">
                                    @if($checktech == null)
                                    <a href="#assignTechnician" class="btn btn-primary btn-sm btn-block" data-toggle="modal"><span
                                            class="cui-wrench"></span>Assign Technician/s</a>
                                    @else
                                    <button data-target="#modifyTechnician" class="btn btn-warning btn-sm btn-block" data-toggle="modal"><span
                                            class="fa fa-pencil"></span> Update</button>
                                    <button data-target="#assignTechnician" class="btn btn-dark btn-sm btn-block" disabled><span
                                            class="cui-wrench"></span> Assign Technician/s</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End 3rd Tab --}}
                </div>
                {{-- End Tab Content --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-sm-12">
        <div class="card">
            <div class="card-header bg-primary">
                <strong>Service Log</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <ul class="progress-tracker progress-tracker--text progress-tracker--center">
                            <li class="progress-step" id="pending-status-2">
                                <span class="progress-marker"></span>
                                <span class="progress-text">
                                    <h6 class="progress-title">Pending</h6>
                                </span>
                            </li>
                            <li class="progress-step" id="received-status-2">
                                <span class="progress-marker"></span>
                                <span class="progress-text">
                                    <h6 class="progress-title">Received</h6>
                                </span>
                            </li>
                            <li class="progress-step" id="uu-status-2">
                                <span class="progress-marker"></span>
                                <span class="progress-text">
                                    <h6 class="progress-title">Under Inspection</h6>
                                </span>
                            </li>
                            <li class="progress-step" id="inspected-status-2">
                                <span class="progress-marker"></span>
                                <span class="progress-text">
                                    <h6 class="progress-title">Inspected</h6>
                                </span>
                            </li>
                    
                            <li class="progress-step" id="ongoing-status-2">
                                <span class="progress-marker"></span>
                                <span class="progress-text">
                                    <h6 class="progress-title">Ongoing</h6>
                                </span>
                            </li>
                            <li class="progress-step" id="completed-status-2">
                                <span class="progress-marker"></span>
                                <span class="progress-text">
                                    <h6 class="progress-title">Completed</h6>
                                </span>
                            </li>
                            <li class="progress-step" id="evaluated-status-2">
                                <span class="progress-marker"></span>
                                <span class="progress-text">
                                    <h6 class="progress-title">Evaluated</h6>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <table class="table table-hover table-striped dataTable-log">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('partials._status')
@include('partials._evaluation')
@include('partials._ocular-inspection')
@include('partials._assign-technician')
@include('partials._modify-technician')
@include('partials._deny-request')

@endsection
{{-- --------------- --}}
{{-- End Content Section --}}

{{-- *********************************************************************** --}}

{{-- Additional Scripts Section --}}
{{-- --------------- --}}
@section('addScripts')
{{ Html::script('public/coreui/js/jQuery/js/jquery.maskedinput.js') }}
<script src="{{ asset('public/coreui/js/dataTables.js') }}"></script>
<script src="{{ asset('public/coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('public/coreui/js/dataTable-function.js') }}"></script>
{{ Html::script('public/coreui/js/select2/js/select2.full.min.js') }}
<script>

    function getCurrentStatus()
    {
        var id = $('#request_id').val(),
            statusWrapper = $('#statusWrapper');

        $.ajax({
            method: 'post',
            url: '{{ route('api/getCurrentStatus') }}',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                statusWrapper.text(res.status_name)
            },
            error: function(x) {
                console.log(x.responseText);
            }
        })
    }

    function denyRequest()
    {
        var id = $('#request_id').val(),
            reason = $('#cancel_remark').val(),
            user = $("#cancelled_by").val();

        $.ajax({
            method: 'post',
            url: '{{ route('api/cancelRequest') }}',
            data: {
                id: id,
                cancel_remark: reason,
                cancelled_by: user
            },
            success: function(res) {
                Swal.fire(
                    'Request Canceled',
                    'This request has been canceled.',
                    'success'
                );

                getCurrentStatus();
            },
            error: function(x) {
                console.log(x.responseText);
            }
        })
    }

    function getProgress(x)
    {
        $.ajax({
            url: "{{ route('api/getProgress') }}",
            data: {
                postid: x
            },
            method: 'post',
            dataType: 'json',
            success: function(res){
                console.log(res.logstatus_id);
                if(res.logstatus_id == 2 || res.logstatus_id == 1)
                {
                    $('#pending-status-2').addClass('is-active');
                    $('#pending-status-2').removeClass('is-complete');

                    $('#received-status-2').removeClass('is-active is-complete');

                    $('#uu-status-2').removeClass('is-active is-complete');

                    $('#inspected-status-2').removeClass('is-active is-complete');

                    $('#ongoing-status-2').removeClass('is-active is-complete');

                    $('#completed-status-2').removeClass('is-active is-complete');

                    $('#evaluated-status-2').removeClass('is-active is-complete');
                } else if(res.logstatus_id == 3) {
                    $('#pending-status-2').removeClass('is-active');
                    $('#pending-status-2').addClass('is-complete');

                    $('#received-status-2').removeClass('is-completed');
                    $('#received-status-2').addClass('is-active');

                    $('#uu-status-2').removeClass('is-active is-complete');

                    $('#inspected-status-2').removeClass('is-active is-complete');

                    $('#ongoing-status-2').removeClass('is-active is-complete');

                    $('#completed-status-2').removeClass('is-active is-complete');

                    $('#evaluated-status-2').removeClass('is-active is-complete');

                } else if(res.logstatus_id == 4) {

                    $('#pending-status-2').removeClass('is-active');
                    $('#pending-status-2').addClass('is-complete');

                    $('#received-status-2').removeClass('is-active');
                    $('#received-status-2').addClass('is-complete');

                    $('#uu-status-2').removeClass('is-completed');
                    $('#uu-status-2').addClass('is-active');

                    $('#inspected-status-2').removeClass('is-active is-complete');

                    $('#ongoing-status-2').removeClass('is-active is-complete');

                    $('#completed-status-2').removeClass('is-active is-complete');

                    $('#evaluated-status-2').removeClass('is-active is-complete');

                } else if(res.logstatus_id == 5) {
                    $('#pending-status-2').removeClass('is-active');
                    $('#pending-status-2').addClass('is-complete');

                    $('#received-status-2').removeClass('is-active');
                    $('#received-status-2').addClass('is-complete');

                    $('#uu-status-2').removeClass('is-active');
                    $('#uu-status-2').addClass('is-complete');
                    
                    $('#inspected-status-2').removeClass('is-complete');
                    $('#inspected-status-2').addClass('is-active');

                    $('#ongoing-status-2').removeClass('is-active is-complete');

                    $('#completed-status-2').removeClass('is-active is-complete');

                    $('#evaluated-status').removeClass('is-active is-complete');
                } else if(res.logstatus_id == 7 || res.logstatus_id == 9) {
                    $('#pending-status-2').removeClass('is-active');
                    $('#pending-status-2').addClass('is-complete');

                    $('#received-status-2').removeClass('is-active');
                    $('#received-status-2').addClass('is-complete');

                    $('#uu-status-2').removeClass('is-active');
                    $('#uu-status-2').addClass('is-complete');

                    $('#inspected-status-2').removeClass('is-active');
                    $('#inspected-status-2').addClass('is-complete');

                    $('#ongoing-status-2').removeClass('is-completed');
                    $('#ongoing-status-2').addClass('is-active');

                    $('#completed-status-2').removeClass('is-active is-complete');

                    $('#evaluated-status-2').removeClass('is-active is-complete');

                } else if(res.logstatus_id == 10) {
                    $('#pending-status-2').removeClass('is-active');
                    $('#pending-status-2').addClass('is-complete');

                    $('#received-status-2').removeClass('is-active');
                    $('#received-status-2').addClass('is-complete');

                    $('#uu-status-2').removeClass('is-active');
                    $('#uu-status-2').addClass('is-complete');

                    $('#inspected-status-2').removeClass('is-active');
                    $('#inspected-status-2').addClass('is-complete');

                    $('#ongoing-status-2').removeClass('is-active');
                    $('#ongoing-status-2').addClass('is-complete');

                    $('#completed-status-2').removeClass('is-completed');
                    $('#completed-status-2').addClass('is-active');
                    
                    $('#evaluated-status-2').removeClass('is-active is-complete');
                } else if(res.logstatus_id == 11) {
                    $('#pending-status-2').removeClass('is-active');
                    $('#pending-status-2').addClass('is-complete');

                    $('#received-status-2').removeClass('is-active');
                    $('#received-status-2').addClass('is-complete');

                    $('#uu-status-2').removeClass('is-active');
                    $('#uu-status-2').addClass('is-complete');

                    $('#inspected-status-2').removeClass('is-active');
                    $('#inspected-status-2').addClass('is-complete');

                    $('#ongoing-status-2').removeClass('is-active');
                    $('#ongoing-status-2').addClass('is-complete');

                    $('#completed-status-2').removeClass('is-active');
                    $('#completed-status-2').addClass('is-complete');
                    
                    $('#evaluated-status-2').removeClass('is-complete');
                    $('#evaluated-status-2').addClass('is-active');
                } else {
                    $('#pending-status-2').removeClass('is-active is-complete');

                    $('#received-status-2').removeClass('is-active is-complete');

                    $('#uu-status-2').removeClass('is-active is-complete');

                    $('#inspected-status-2').removeClass('is-active is-complete');

                    $('#ongoing-status-2').removeClass('is-active is-complete');

                    $('#completed-status-2').removeClass('is-active is-complete');

                    $('#evaluated-status-2').removeClass('is-active is-complete');
                }
            }
        });
    }


    function modifyTechnician()
    {
        var id = $('#request_id').val(),
            techs = $('#technicians').val();

        // $.ajax({
        //     method: 'post',
        //     url: '{{ route('api/modifyTechnician') }}',
        //     data: {
        //         id: id,
        //         technicians:techs
        //     },
        //     dataType: 'json',
        //     success: function(res) {
        //         Swal.fire(
        //             'Technician/s Updated!',
        //             'The Assigned technician/s has been updated.',
        //             'success'
        //         );

        //         // for(i=0; i<res.length; i++  )
        //         // {

        //         // }
        //     },
        //     error: function(x) {
        //         console.log(x.responseText);
        //     }
        // })
        
        $.ajax({
            method: 'post',
            url: '{{ route('api/modifyTechnician') }}',
            data: {
                id: id,
                technicians:techs
            },
            dataType: 'json',
            success: function(res) {
                Swal.fire(
                    'Technician/s Updated!',
                    'The Assigned technician/s has been updated.',
                    'success'
                );

                // for(i=0; i<res.length; i++  )
                // {

                // }
            },
            error: function(x) {
                console.log(x.responseText);
            }
        })
    }

    $(document).ready(function () {
        getCurrentStatus();
        getProgress($('#post_id').val());

        // $('#printServiceReport').click(function(){
        // // For Generating Service Report
        //     $.ajax({
        //         method: 'post',
    //         url: '{{ route("api/getServiceReport") }}',
        //         data: {
        //             postid: '{{ $selectedpost->id }}',
        //         },
        //         success: function (e) {
        //             // $(document).html(e);
        //         }
        //     });
        // });

        // For Logs Details

        $('#printServiceReport').click(function() {
            $('#PDFForm').submit();
        });

        $('.dataTable-log').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("api/postlogs") }}',
                data: {
                    id: '{{ $selectedpost->id }}',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            columns: [
                {data: 2, name: 'created_at'},
                {data: 1, name: 'status'},
            ],
            order: [[ 0, 'desc' ]]
        })
        // End Log Details

        // For Supplies Details
        $('.dataTable-supplies').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("api/allPostSupplies") }}',
                data: {
                    id: '{{ $selectedpost->id }}',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        })
        // End Supplies Details

        // For Inspection Details
        $.ajax({
            dataType: "json",
            url: '{{ route("identInspection") }}',
            data: {
                'id': '{{ $selectedpost->id }}',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (e) {
                var details = $("#details-ins"),
                recommendation = $('#recommendation-ins'),
                loadins = $('#load-ins'),
                propdate = $('#date-ins'),
                wrapper = $('#editInspectionWrapper');

                details.text(e.details);
                recommendation.text(e.recommendation);
                propdate.text(e.proposed_schedule);
                loadins.text(e.load_points);

                if(e.length != 0) {

                }
            }
        });
        // End Inspection Ajax

        $.ajax({
            method: 'post',
            url: '{{ route("api/getRequesterProfile") }}',
            data: {
                id: '{{ $selectedpost->emp_idno }}',
                id2: '{{ $selectedpost->user_id }}'
            },
            succcess: function(res)
            {
                console.log(res);
                $('#requester').val(res);
            }
        })

        $.ajax({
            dataType: 'json',
            url: "{{ route('api/assignedTechnician') }}",
            data: {
                'postid': "{{ $selectedpost->id }}",
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (e) {
                for (var j = 0; j < e.length; j++) {
                    $('#technicianNames').append(
                        "<li class='list-group-item highlight-teal'><i class='cui-user'></i> " +
                        e[j].emp_fullname + "</li>");
                }
            }
        })

        $.ajax({
            dataType: 'json',
            url: "{{ route('api/getTicketNumber') }}",
            data: {
                'id': "{{ $selectedpost->id }}",
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (e) {
                $('#ticket-wrapper').val(e.ticket_full);
            }
        });

        $.ajax({
            dataType: 'json',
            url: "{{ route('api/getReceiver') }}",
            data: {
                'postid': "{{ $selectedpost->id }}",
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (e) {
                var formHtml ='<div class="highlight-teal"><div class="highlight-header text-white"><small>Received By:</small><br><i class="fa fa-user"></i> <span id="receiver">'+e.emp_fullname+'</span></div></div><div class="pull-right highlight-header" style="background: white !important; width: 100% !important"><small>Date Received:</small><br><i class="fa fa-calendar"></i> <span id="receive-date">'+e.created_at+'</span></div>';
                
                $('.receiver-wrapper').html(formHtml);
            }
        });

        // Select2 Binding
        $('#select2').select2();
        // End Select2 Binding

        $("#btnAssignTechnician").click(function (e) {
            $('#assignTechnician').modal('show');
        })

        $("#technicians").select2({
            ajax: {
                type: 'GET',
                dataType: 'JSON',
                url: "{{ route('technicianOptions') }}",
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.emp_fullname,
                                id: item.id
                            }
                        })
                    };
                }
            },
            style: {
                color: 'black'
            }
        })

        $("#technicians2").select2({
            ajax: {
                type: 'GET',
                dataType: 'JSON',
                url: "{{ route('technicianOptions') }}",
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.emp_fullname,
                                id: item.id
                            }
                        })
                    };
                }
            },
            style: {
                color: 'black'
            }
        })

        $(".select2-supplies").select2({
            ajax: {
                type: 'GET',
                dataType: 'JSON',
                url: "{{ route('api/allSuppliesSelect') }}",
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.supply_name + ' - ' + item.brand_name
                            }
                        })
                    };
                }
            }
        });

        $('#modifyTechnicianForm').on('submit', function(e) {
            e.preventDefault();

            modifyTechnician();
        })
    })

    $('#denyConfirm').click(function(){
        denyRequest();
    });

</script>

@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}