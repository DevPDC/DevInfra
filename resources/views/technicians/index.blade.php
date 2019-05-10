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
        <a href="#">Technicians</a> 
    </li>
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
                        <i class="icon-wrench"></i> List of Active Servicemen

                        <span class="pull-right">

                            <a href="#newTechnician" data-toggle="modal" class="btn btn-primary btn-sm">Add New Technician</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-stripe dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Contact No</th>
                                    <th>Active</th>
                                    <th>Services</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                @include('partials._new-technician')
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
        {{ Html::style('public/coreui/css/select2/select2.min.css') }}
    @endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Scripts Section --}}
{{-- --------------- --}}
    @section('addScripts')
        {{ Html::script('public/coreui/js/jQuery/js/jquery.maskedinput.js') }}
        <script src="{{ asset('public/coreui/js/dataTables.js') }}"></script>
        <script src="{{ asset('public/coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('public/coreui/js/dataTable-function.js') }}"></script>
        {{ Html::script('public/coreui/js/select2/js/select2.min.js') }}

        <script>
            $(document).ready(function() {
                $('.dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('api/allTechnicians') }}",
                    columns: [
                        {data: 0, name: 'id'},
                        {data: 1, name: 'id'},
                        {data: 2, name: 'id'},
                        {data: 3, name: 'id'},
                        {data: 4, name: 'id'},
                        {data: 6, name: 'id'},
                        {data: 7, name: 'id'}
                    ]
                })

                $('.select2').select2({
                    placeholder: 'Enumerate Scope/s of Service',
                    multiple: true,
                    ajax: {
                        type: 'GET',
                        dataType: 'JSON',
                        url: "{{ route('api/getServiceCategories') }}",
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.category_name,
                                        id: item.id
                                    }
                                })
                            };
                        }
                    },
                    style: {
                        color: 'black'
                    }
                });

                $('#searchEmpidText').mask('99-9999');


            })

            $('#searchEmpidText').keyup(function(e){
                var res = $(this).val();
                $.ajax({
                    url:"{{ route('searchByEmpid') }}",
                    type:'POST',
                    data:  {id:res},
                    dataType: 'json',
                    success: function(data) {
                        // $.each(json, function(i, value) {
                        //     $('#searchEmpid').append($('<option>').text(value).attr('value', value));
                        // });
                        var name = $('#name')
                            station = $('#station')
                            division = $('#division')
                            email = $('#email_official')
                            empid = $('#employeeid')
                            spanid = $('#id')
                            spanname = $('#empname')
                            spandiv = $('#divname')
                            spanstat = $('#statname')
                            spanemailoff = $('#emailoff')
                            spanid = $('#id');

                        setTimeout(function(){
                            if(data.emp_fullname != '')
                            {
                            name.val(data.emp_fullname);
                            station.val(data.station_name);
                            division.val(data.division_name);
                            email.val(data.emp_email_official);
                            empid.val(data.emp_idno);
                            
                            spanid.val(data.emp_idno);
                            spanname.text(data.emp_fullname);
                            spandiv.text(data.division_name);
                            spanstat.text(data.station_name);
                            spanemailoff.text(data.emp_email_official);
                            }
                            else
                            {
                            name.val() = '';
                            station.val() = '';
                            division.val() = '';
                            email.val() = '';
                            empid.val() = '';

                            spanname.text('');
                            spandiv.text() = '';
                            spanstat.text() = '';
                            spanemailoff.text() = '';
                        }}, 500)
                        
                        
                    }
                });
            })
        </script>
        {{-- <script>
            search.keyup(function()
            {
            var search = $('#searchEmpidText')
                empid = $('#employeeid')
                a = search.val()
                b = empid.val()
                categories = $('#categories');

                setTimeout(function(a,b){
                    if(a == b)
                    {
                        categories.prop('hidden','false');
                    }
                    else
                    {
                        categories.prop('hidden','true');
                    }
                }, 500);
            })

        </script> --}}
    @endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}