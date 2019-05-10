@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
    @section('title','Supplies')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title')
    <li class="breadcrumb-item"><a href="#">Supplies</a></li>
@endsection
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
    @section('content')
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">
                            Inventory of Supplies
                        </span>
                        <span class="pull-right">
                            <a href="#addSupplyForm" class="btn btn-success btn-sm" type="button" data-toggle="modal" >
                                <i class="fa fa-plus"></i> Add New Supply
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-unbordered dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Supply</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                    <th>Added On</th>
                                    <th>Last Update</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        @include('partials._add-supplies')
    @endsection
{{-- --------------- --}}
{{-- End Content Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
    @section('addStyles')
        {{ Html::style('public/coreui/css/dataTables/css/dataTables.bootstrap4.css') }}
        {{ Html::style('public/coreui/css/select2/select2.min.css') }}
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
        {{ Html::script('public/coreui/js/select2/js/select2.full.min.js') }}
        
        <script>    
                $(document).ready(function() {
                    $('.dataTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route('api/allSupplies') }}'
                    });
                });
        </script>

        <script>
            $(".select2-brands").select2({
                ajax: {
                    type: 'GET',
                    dataType: 'JSON',
                    url: "{{ route('api/allBrandsSelect') }}",
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    id: item.id,
                                    text: item.brand_name
                                }
                            })
                        };
                    }
                }
            });
        </script>
    @endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}