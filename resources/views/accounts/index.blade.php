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
@section('breadcrumb-title')
    <li class="breadcrumb-item">
        Accounts Manager
    </li>
@endsection
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
    @section('content')
        <div class="row">
            <div class="col-md-5 col-sm-12"></div>
            <div class="col-md-3 col-sm-12">
                <a class="btn btn-danger btn-sm btn-block" data-toggle="modal" href="#addUser">ADD NEW USER</a>
            </div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-borderless dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>EmployeeID</th>
                                    <th>Owner</th>
                                    <th>Position</th>
                                    <th>Current Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
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
                <div class="tab-content">
                    {{-- 1st Tab --}}
                    <div class="tab-pane active show" id="request_details" role="tabpanel">
                        <div class="row">
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
        {{ Html::style('public/coreui/css/dataTables/css/dataTables.bootstrap4.css') }}
    @endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Scripts Section --}}
{{-- --------------- --}}
    @section('addScripts')
        <script src="{{ asset('public/coreui/js/dataTables.js') }}"></script>
        <script src="{{ asset('public/coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('public/coreui/js/dataTable-function.js') }}"></script>

        <script>

            $(document).ready(function(){
                $('.dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('api/AllRegisteredUsers') }}"
                    }
                })
            })
        </script>
    @endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}