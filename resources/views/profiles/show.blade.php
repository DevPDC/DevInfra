@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('title'," $profile->emp_fullname ")
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title')
    <li class='breadcrumb-item'>
        Profile
    </li>
    <li class='breadcrumb-item'>
        <a href='#'>{{ $profile->emp_fullname }}</a>
    </li>
@endsection
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
@section('addStyles')
    {{ Html::style('public/coreui/css/dataTables/css/dataTables.bootstrap4.css') }}
@endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
@section('content')
<div class="row" id="app">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <img src="http://192.168.10.17/hris/assets/images/profile/{{ $profile->profile_picture }}" id="profile-picture" alt="profile picture" style="width:100%;height:100$;">
            </div>

            {{-- <img class="profile-user-img img-responsive img-circle" src="http://192.168.10.17/hris/assets/images/profile/{{ $profile->profile_picture }}" alt="User profile picture"> --}}
            
            <h3 class="profile-username text-center">
                <i class="icons font-2xl mt-5 cui-user"></i> {{ $profile->emp_fullname }}
            </h3>
            <p class="text-muted text-center">
                @if($position !== null)
                    {{ $position->position_name }}
                @else
                    No Data Found
                @endif
            </p>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>E-mail(official)</b> <a class="pull-right">{{ $profile->emp_email_official }}</a>
                </li>
                <li class="list-group-item">
                    <b>Contact No.</b> <a class="pull-right">{{ $profile->emp_cpno }}</a>
                </li>
                <li class="list-group-item">
                    @if($unit !== null)
                        <b>Unit</b> <a class="pull-right">{{ $unit->unit_name }}</a>
                    @else
                        <b>Unit</b> <a class="pull-right">No unit</a>
                    @endif

                </li>
                <li class="list-group-item">
                    @if($office !== null)
                    <b>Office</b> <a class="pull-right">{{ $office->office_name }}</a>
                    @else
                    <b>Office</b> <a class="pull-right">No Office</a>
                    @endif
                </li>
                <li class="list-group-item">
                    @if($division !== null)
                        <b>Division</b> <a class="pull-right">{{ $division->division_name }}</a>
                    @else
                        <b>Division</b> <a class="pull-right">No Division</a>
                    @endif
                </li>
                <li class="list-group-item">
                    @if($station !== null)
                        <b>Station</b> <a class="pull-right">{{ $station->station_name }}</a>
                    @else
                        <b>Station</b> <a class="pull-right">No Station</a>
                    @endif
                </li>
            </ul>

            {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
        </div>
        <!-- /.card-body -->
    </div>
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                {{-- {{ $reqs->count() }} --}}
                <strong> List of Requests <span class="label label-primary"></span></strong>
            </div>
            <div class="card-body">
                <table class="table table-hover dataTable" id="dataTable">
                    <thead>
                        <th>#</th>
                        <th>Category</th>
                        <th>Date of Request</th>
                        <th>Status</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- --------------- --}}
{{-- End Content Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Scripts Section --}}
{{-- --------------- --}}
@section('addScripts')
<script src="{{ asset('public/coreui/js/dataTables.js') }}"></script>
<script src="{{ asset('public/coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('public/coreui/js/dataTable-function.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('api/allUserRequests') }}",
                data: {
                    userid : "{{ $profile->emp_idno }}",
                    'X-CSRF-TOKEN':'{{ csrf_token() }}'
                }
            }
        })
    })
</script>
@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}