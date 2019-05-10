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
    <li class="breadcrumb-item">Brands</li>
@endsection
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-list"></i> 
                        List of Brands

                        <span class="pull-right">
                            <a href="#addBrand" data-toggle="modal" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Add New Brand
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsived table-hover table-striped" id="table-brands" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Brand Name</th>
                                    <th>Items</th>
                                    <th>Added By</th>
                                    <th>Created On</th>
                                    <th>Last Update</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>{{ $brand->supply()->count() }}</td>
                                        <td><a href="{{ route('profile.show',$brand->user_id) }}">{{ $brand->user_id }}</a></td>
                                        <td>{{ $brand->created_at }}</td>
                                        <td>{{ $brand->updated_at }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>

        @include('partials._add-brand')
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
            // For Supplies Details
            $('#table-brands').DataTable()
            // End Supplies Details
        </script>
    @endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}