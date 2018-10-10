@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('title','')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title','')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
@section('addStyles')

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
                <img src="https://www.thehindu.com/sci-tech/technology/internet/article17759222.ece/alternates/FREE_660/02th-egg-person" id="profile-picture" alt="profile picture" style="width:100%;height:100$;">
            </div>

            {{-- <img class="profile-user-img img-responsive img-circle" src="https://www.thehindu.com/sci-tech/technology/internet/article17759222.ece/alternates/FREE_660/02th-egg-person" alt="User profile picture"> --}}
            
            
            <h3 class="profile-username text-center">
                <i class="icons font-2xl mt-5 cui-user"></i> {{ $profile->emp_fullname }}
            </h3>
            <p class="text-muted text-center">{{ $position->position_name }}</p>
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
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <th>#</th>
                        <th>Category</th>
                        <th>Date of Request</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach($reqs as $req)
                        <tr>
                            <td>{{ $req->id }}</td>
                            <td>{{ $req->category->category_name }}</td>
                            <td>{{ $req->created_at }}</td>
                            <td>
                                @if($req->status->status_name === 'Pending')
                                <a href="{{ route('status.show', $req->status_id) }}" class="label bg-navy">{{$req->status->status_name}}</a>
                                @elseif($req->status->status_name === 'Rendering Service')
                                <a href="{{ route('status.show', $req->status_id) }}" class="label label-primary">{{$req->status->status_name}}</a>
                                @elseif($req->status->status_name === 'Under Inspection')
                                <a href="{{ route('status.show', $req->status_id) }}" class="label label-primary">{{$req->status->status_name}}</a>
                                @elseif($req->status->status_name === 'Service Completed')
                                <a href="{{ route('status.show', $req->status_id) }}" class="label label-success">{{$req->status->status_name}}</a>
                                @elseif($req->status->status_name === 'Unfiltered')
                                <a href="{{ route('status.show', $req->status_id) }}" class="label label-danger">{{$req->status->status_name}}</a>
                                @elseif($req->status->status_name === 'Paused Service')
                                <a href="{{ route('status.show', $req->status_id) }}" class="label label-warning">{{$req->status->status_name}}</a>
                                @elseif($req->status->status_name === 'Need Materials')
                                <a href="{{ route('status.show', $req->status_id) }}" class="label label-primary">{{$req->status->status_name}}</a>
                                @elseif($req->status->status_name === 'Service Completed')
                                <a href="{{ route('status.show', $req->status_id) }}" class="label label-success">{{$req->status->status_name}}</a>
                                @elseif($req->status->status_name === 'Completed & Evaluated')
                                <a href="{{ route('status.show', $req->status_id) }}" class="label label-success">{{$req->status->status_name}}</a>
                                @elseif($req->status->status_name === 'Received')
                                <a href="{{ route('status.show', $req->status_id) }}" class="label label-primary">{{$req->status->status_name}}</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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

@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}