@extends('layouts.coreui')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('title','dataTable')
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
<div class="container-fluid">
    <div id="ui-view">
        <div>
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i> DataTables
                        <div class="card-header-actions">
                            <a class="card-header-action" href="https://datatables.net" target="_blank">
                                <small class="text-muted">docs</small>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0"
                                        role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 378.75px;" aria-sort="ascending"
                                                    aria-label="Username: activate to sort column descending">Username</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 337.35px;" aria-label="Date registered: activate to sort column ascending">Date
                                                    registered</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 156.233px;" aria-label="Role: activate to sort column ascending">Role</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 171.75px;" aria-label="Status: activate to sort column ascending">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 340.917px;" aria-label="Actions: activate to sort column ascending">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">Adam Alister</td>
                                                <td>2012/01/21</td>
                                                <td>Staff</td>
                                                <td>
                                                    <span class="badge badge-success">Active</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="#">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">Adinah Ralph</td>
                                                <td>2012/06/01</td>
                                                <td>Admin</td>
                                                <td>
                                                    <span class="badge badge-dark">Inactive</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="#">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">Ajith Hristijan</td>
                                                <td>2012/03/01</td>
                                                <td>Member</td>
                                                <td>
                                                    <span class="badge badge-warning">Pending</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="#">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">Alphonse Ivo</td>
                                                <td>2012/01/01</td>
                                                <td>Member</td>
                                                <td>
                                                    <span class="badge badge-success">Active</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="#">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">Anton Phunihel</td>
                                                <td>2012/01/01</td>
                                                <td>Member</td>
                                                <td>
                                                    <span class="badge badge-success">Active</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="#">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">Bao Gaspar</td>
                                                <td>2012/01/01</td>
                                                <td>Member</td>
                                                <td>
                                                    <span class="badge badge-success">Active</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="#">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">Bernhard Shelah</td>
                                                <td>2012/06/01</td>
                                                <td>Admin</td>
                                                <td>
                                                    <span class="badge badge-dark">Inactive</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="#">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">Bünyamin Kasper</td>
                                                <td>2012/08/23</td>
                                                <td>Staff</td>
                                                <td>
                                                    <span class="badge badge-danger">Banned</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="#">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">Carlito Roffe</td>
                                                <td>2012/08/23</td>
                                                <td>Staff</td>
                                                <td>
                                                    <span class="badge badge-danger">Banned</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="#">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1">Chidubem Gottlob</td>
                                                <td>2012/02/01</td>
                                                <td>Staff</td>
                                                <td>
                                                    <span class="badge badge-danger">Banned</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="#">
                                                        <i class="fa fa-search-plus"></i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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




{{-- Additional Scripts Section --}}
{{-- --------------- --}}
@section('addScripts')
{{ Html::script('coreui/js/dataTables.js') }}
{{ Html::script('coreui/js/dataTables/js/dataTables.bootstrap4.js') }}
{{ Html::script('coreui/js/dataTable-function.js') }}
@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}