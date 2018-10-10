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
@section('breadcrumb-title',"Service Request / $selectedpost->id")
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
@section('addStyles')
{{ Html::style('coreui/css/dataTables/css/dataTables.bootstrap4.css') }}
{{ Html::style('custom/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
@endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
@section('content')
<div class="row">
    <div class="col-md-8 col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                {{-- Tab List --}}
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#request_details" role="tab" aria-controls="home"
                            aria-selected="false"><i class="fa fa-wrench"></i> Request Details </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#inspection" role="tab" aria-controls="profile"
                            aria-selected="false"><i class="fa fa-eye"></i> Ocular Inspection </a>
                    </li>
                </ul>
                {{-- ------------ --}}
                {{-- Tab Content --}}
                <div class="tab-content">
                    {{-- 1st Tab --}}
                    <div class="tab-pane active show" id="request_details" role="tabpanel">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                Service Request # <a class="pull-right text-red">{{ $selectedpost->id }}</a>
                            </li>
                            <li class="list-group-item">
                                Requester <a class="pull-right" href="{{ route('profile.show', $selectedpost->user_id) }}">{{
                                    $selectedpost->user_id }}</a>
                            </li>
                            <li class="list-group-item">
                                Date Submitted <a class="pull-right">{{ $selectedpost->created_at }}</a>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-12">
                                        Service Category <a class="pull-right"><span class="label label-success">{{
                                                $selectedpost->category->category_name }}</span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <b>Current Status</b>
                                <span class="pull-right">
                                    @if($selectedpost->status->status_name === 'Pending')
                                    <a href="{{ route('status.show', $selectedpost->status_id) }}" class="label bg-navy">{{$selectedpost->status->status_name}}</a>
                                    @elseif($selectedpost->status->status_name === 'Rendering Service')
                                    <a href="{{ route('status.show', $selectedpost->status_id) }}" class="label label-primary">{{$selectedpost->status->status_name}}</a>
                                    @elseif($selectedpost->status->status_name === 'Under Inspection')
                                    <a href="{{ route('status.show', $selectedpost->status_id) }}" class="label label-primary">{{$selectedpost->status->status_name}}</a>
                                    @elseif($selectedpost->status->status_name === 'Service Completed')
                                    <a href="{{ route('status.show', $selectedpost->status_id) }}" class="label label-success">{{$selectedpost->status->status_name}}</a>
                                    @elseif($selectedpost->status->status_name === 'Unfiltered')
                                    <a href="{{ route('status.show', $selectedpost->status_id) }}" class="label label-danger">{{$selectedpost->status->status_name}}</a>
                                    @elseif($selectedpost->status->status_name === 'Paused Service')
                                    <a href="{{ route('status.show', $selectedpost->status_id) }}" class="label label-warning">{{$selectedpost->status->status_name}}</a>
                                    @elseif($selectedpost->status->status_name === 'Need Materials')
                                    <a href="{{ route('status.show', $selectedpost->status_id) }}" class="label label-primary">{{$selectedpost->status->status_name}}</a>
                                    @elseif($selectedpost->status->status_name === 'Service Completed')
                                    <a href="{{ route('status.show', $selectedpost->status_id) }}" class="label label-success">{{$selectedpost->status->status_name}}</a>
                                    @elseif($selectedpost->status->status_name === 'Completed & Evaluated')
                                    <a href="{{ route('status.show', $selectedpost->status_id) }}" class="label label-success">{{$selectedpost->status->status_name}}</a>
                                    @elseif($selectedpost->status->status_name === 'Received')
                                    <a href="{{ route('status.show', $selectedpost->status_id) }}" class="label label-primary">{{$selectedpost->status->status_name}}</a>
                                    @endif
                                </span>
                            </li>
                        </ul>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-check"></i>Client's Note
                            </div>
                            <div class="card-body">
                                {{ $selectedpost->request_details }}
                            </div>
                        </div>
                    </div>
                    {{-- End 1st Tab --}}
                    {{-- 2nd Tab --}}
                    <div class="tab-pane" id="inspection" role="tabpanel">
                        <div class="container-fluid" id="content-wrapper">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Proposed Date of Service</b> <a class="pull-right" id="date-ins"></a>
                                        </li>
                                    </ul>
                                    <br>
                                    <div class="card">
                                        <div class="card-header">
                                            <i class="fa fa-check"></i> Inspection Details
                                        </div>
                                        <div class="card-body" id="details-ins">
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <i class="fa fa-check"></i> Recommendation
                                        </div>
                                        <div class="card-body" id="recommendation-ins">
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
                            <div class="col-md-10 col-sm-12"></div>
                            <div class="col-md-2 col-sm-12">
                                @if($inspection === null)
                                    <a href="#addOcularInspection" class="btn-sm btn btn-primary btn-block" data-toggle="modal"><i class="fa fa-edit"></i> Add Inspection Details</a>
                                @else
                                    <button href="#addOcularInspection" class="btn-sm btn btn-dark btn-block" disabled data-toggle="modal"><i class="fa fa-edit"></i> Add Inspection Details</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- End 2nd Tab --}}
                </div>
                {{-- End Tab Content --}}
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong>Service Log</strong>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped dataTable-log">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('partials._ocular-inspection')

@endsection
{{-- --------------- --}}
{{-- End Content Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Scripts Section --}}
{{-- --------------- --}}
@section('addScripts')
{{ Html::script('coreui/js/jQuery/js/jquery.maskedinput.js') }}
<script src="{{ asset('coreui/js/dataTables.js') }}"></script>
<script src="{{ asset('coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('coreui/js/dataTable-function.js') }}"></script>
{{ Html::script('custom/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
<script>
    $(document).ready(function () {
        // For Logs Details
        $('.dataTable-log').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ asset('api/postlogs') }}',
                data: {
                    id: '{{ $selectedpost->id }}',
                    'X-CSRF-TOKEN':'{{ csrf_token() }}'

                }
            }
        })
        // End Log Details
        
        // For Supplies Details
        $('.dataTable-supplies').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ asset('api/allPostSupplies') }}',
                data: {
                    id: '{{ $selectedpost->id }}',
                    'X-CSRF-TOKEN':'{{ csrf_token() }}'

                }
            }
        })
        // End Supplies Details

        // For Inspection Details
        $.ajax({
            dataType: "json",
            url: '{{ route('identInspection') }}',
            data: {
                'id': '{{ $selectedpost->id }}',
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            },
            success: function(e)
            {
                var details = $("#details-ins")
                    recommendation = $('#recommendation-ins')
                    propdate = $('#date-ins');

                    details.text(e.details);
                    recommendation.text(e.recommendation);
                    propdate.text(e.proposed_schedule);
            }
        });
        // End Inspection Ajax

        // Date picker Initialization
        $('#datepicker').datepicker({
            autoclose: true
        })
        // End Initialization
    })
</script>
@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}