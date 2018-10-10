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
@section('breadcrumb-title','Service Requests')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
    @section('addStyles')
        {{ Html::style('coreui/css/dataTables/css/dataTables.bootstrap4.css') }}
    @endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
    @section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-info">
                <div class="card-header">
                    <i class="fa fa-table"></i>
                    <strong>List of Service Categories <span class="label label-primary">{{ $categories->count() }}</span></strong>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Category Abbr</th>
                            <th># of requests</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm btn-block"><i class="fa fa-eye"></i>
                                            {{ $category->category_name }}
                                        </a>
                                    </td>
                                    <td>{{ $category->category_abbr }}</td>
                                    <td><span class="label label-primary">{{ $category->posts->count() }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
                  <!-- /.card -->
        </div>
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                    <i class="fa fa-table"></i>
                    <strong>List of Service Requests</strong>
                    <div class="pull-right">
                        <a class="btn btn-sm btn-primary pull-right" href="#"><i class="fa fa-eye"></i> Ticketed Requests</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover dataTable" id="dataTable">
                        <thead>
                            <th>#</th>
                            <th>UserID</th>
                            <th>Category</th>
                            <th>Request Details</th>
                            <th>Date Requested</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    @include('partials._status')
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
        <script src="{{ asset('coreui/js/dataTables.js') }}"></script>
        <script src="{{ asset('coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('coreui/js/dataTable-function.js') }}"></script>
        <script>    
                $(document).ready(function() {
                    $('.dataTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route('api.allPosts') }}'
                    });
                });

                $('#changeStatusButton').click(function(){
                    $('#changestatus').modal('show')
                })
        </script>
    @endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}