@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
    @section('title',"$infra->infra_name")
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title')
    <li class="breadcrumb-item">
        Infrastructures
    </li>
    <li class="breadcrumb-item">
        <a href="#">{{ $infra->infra_name }}</a>
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
    <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-building"></i>
                        <strong>Facilities Classifications</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Infrastructure</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($infrastructures as $infrastructure)
                                    <tr>
                                        <td>{{ $infrastructure->id }}</td>
                                        <td>{{ $infrastructure->infra_name }}
                                            <span class="badge badge-primary">{{ $infrastructure->facility->count() }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('infrastructure.show', $infrastructure->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-building-o"></i>
                        <strong>{{ $infra->infra_name }} Facilities <span class="label label-primary">{{ $infra->facility->count() }}</span></strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped dataTable" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name of Facility</th>
                                    <th>Facility Details</th>
                                    <th>Date Added</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($infra->facility as $fac)
                                    <tr>
                                        <td>{{ $fac->id }}</td>
                                        <td>{{ $fac->name }}</td>
                                        <td>{{ $fac->details }}</td>
                                        <td>{{ $fac->created_at }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach --}}
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
        <script src="{{ asset('public/coreui/js/dataTables.js') }}"></script>
        <script src="{{ asset('public/coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('public/coreui/js/dataTable-function.js') }}"></script>
        <script>    
                $(document).ready(function() {
                    $('.dataTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: '{{ route("api/allFacilitiesInInfrastructure") }}',
                            method: 'post',
                            data: {
                                id: "{{ $infra->id }}",
                                token: '{{ csrf_token() }}'
                            }
                        }
                    })
                });
        </script>
    @endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}