@extends('layouts.app')

{{-- *********************************************************************** --}}

{{-- Title Section --}}
{{-- --------------- --}}
    @section('title','Service Requests')
{{-- --------------- --}}
{{-- --------------- --}}

{{-- *********************************************************************** --}}

{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title')
    <li class="breadcrumb-item">
        <a href="#">Service Requests</a> 
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
        <div class="col-md-2 col-sm-12">
            <div class="container">
                @php $roles = Auth::user()->role->role_id @endphp
                <h3>Categories</h3>
                <hr>
                <div class="list-group" id="list-tab" role="tablist" style="overflow:hidden">
                    @foreach($categories as $category)
                        <a class="list-group-item list-group-item-action {{ (\Request::route()->getName() == ['category.show',$category->id]) ? 'active' : '' }}" id="list-home-list" href="{{ route('category.show',$category->id) }}" role="tab" aria-controls="list-home" aria-selected="false">{{ $category->category_name }}</a>
                        <br><br>
                    @endforeach
                </div>
            </div>
                  <!-- /.card -->
        </div>
        <div class="col-md-10 col-sm-12">
            <div class="card card-primary">
                <div class="card-header bg-primary">
                    <i class="fa fa-table"></i>
                    <strong>List of Service Requests</strong>
                    <div class="pull-right">
                        <button class="btn btn-info btn-sm" type="button" id="reloadEvaluated"><i class="fa fa-check"></i> View Evaluated</button>
                        <button class="btn btn-info btn-sm" type="button" id="reloadCompleted" style="margin-left: 20px"><i class="fa fa-check"></i> View Completed</button>
                        <button class="btn btn-info btn-sm" type="button" id="reloadPostTable" style="margin-left: 20px"><i class="fa fa-refresh"></i> Refresh Table</button>
                        <a class="btn btn-sm btn-info pull-right" href="{{ route('serviceAlerts') }}" style="margin-left: 20px"><i class="fa fa-envelope"></i> Send Service Alert</a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <span class="pull-right" style="margin-left: 30px !important">
                        <select name="status" id="statusSelect" class="form-control" style="height: 30px">
                            @foreach($status as $st)
                                <option value="{{ $st->id }}">{{ $st->status_name }}</option>
                            @endforeach
                        </select>
                    </span>
                    <table class="table table-hover table-striped table-bordered dataTable no-footer" role="grid" id="dataTable" style="border-collapse: collapse !important">
                        <thead>
                            <th>#</th>
                            <th>From</th>
                            <th>Category</th>
                            <th>Request Details</th>
                            <th>Date Requested</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
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
    
    @if(Auth::check() && $roles === 1 || $roles === 2 || $roles === 3 || $roles === 4 || $roles === 1000)
    <script>    
        $(document).ready(function() {

            $('.dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('api.allPosts') }}',
                columns: [
                    {data: 0, name: 'id'},
                    {data: 11, name: 'empid'},
                    {data: 2, name: 'category'},
                    {data: 10, name: 'details'},
                    {data: 9, name: 'created_at'},
                    {data: 8, name: 'action'},
                ],
                order: [ [ 0, 'desc'] ]
            });
        });
    </script>
    @elseif(Auth::check() && $roles === 5 || $roles === 6)
        <script>
            $(document).ready(function() {
                $('.dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('allPostsDivision') }}',
                        data: {
                            divid: "{{ Auth::user()->profile->emp_division }}"
                        }
                    }

                    
                });
            });
        </script>
    @elseif(Auth::check() && $roles === 7)
        <script> 
            $(document).ready(function() {
                $('.dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('allPostsIndividual') }}',
                        data: {
                            userid: "{{ Auth::user()->user_idno }}"
                        }
                    }
                    
                });
            });
        </script>
    @endif
    <script>
        
        $('#statusSelect').on('change', function()
        {
            var st = $('#statusSelect'),
                table = $('.dataTable'); 

            table.DataTable().destroy();

            table.DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('api.allPostsInStatus') }}',
                    data: {
                        id: st.val()
                    }
                },
                columns: [
                    {data: 0, name: 'id'},
                    {data: 11, name: 'empid'},
                    {data: 2, name: 'category'},
                    {data: 10, name: 'details'},
                    {data: 9, name: 'created_at'},
                    {data: 8, name: 'action'},
                ],
                order: [ [ 0, 'desc'] ]
                
            });
        });

        $(".dataTable #receivedButtons").on("click", function()
        {
            var reqField = $(this).closest("#req_id").val();
            alert(reqField);
        });

        $('#reloadPostTable').click(function() {
            var table = $('#dataTable'),
                options = {
                    theme:"sk-fading-circle",
                    message:'Reloading Service Request Datatable.'
                };

            HoldOn.open(options);

            table.DataTable().destroy();

            table.DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('api.allPosts') }}',
                columns: [
                    {data: 0, name: 'id'},
                    {data: 11, name: 'empid'},
                    {data: 2, name: 'category'},
                    {data: 10, name: 'details'},
                    {data: 9, name: 'created_at'},
                    {data: 8, name: 'action'},
                ],
                order: [ [ 0, 'desc'] ]
            });

            HoldOn.close();
        });

        $('#reloadCompleted').click(function() {
            var table = $('#dataTable'),
                options = {
                    theme:"sk-fading-circle",
                    message:'Reloading Service Request Datatable.'
                };

            HoldOn.open(options);

            table.DataTable().destroy();

            table.DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('api.allPostsInStatus') }}',
                    data: {
                        id: 8
                    }
                },
                columns: [
                    {data: 0, name: 'id'},
                    {data: 11, name: 'empid'},
                    {data: 2, name: 'category'},
                    {data: 10, name: 'details'},
                    {data: 9, name: 'created_at'},
                    {data: 8, name: 'action'},
                ],
                order: [ [ 0, 'desc'] ]
                
            });
            HoldOn.close();
        });

        $('#reloadEvaluated').click(function() {
            var table = $('#dataTable'),
                options = {
                    theme:"sk-fading-circle",
                    message:'Reloading Service Request Datatable.'
                };

            HoldOn.open(options);

            table.DataTable().destroy();

            table.DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('api.allPostsInStatus') }}',
                    data: {
                        id: 9
                    }
                },
                columns: [
                    {data: 0, name: 'id'},
                    {data: 11, name: 'empid'},
                    {data: 2, name: 'category'},
                    {data: 10, name: 'details'},
                    {data: 9, name: 'created_at'},
                    {data: 8, name: 'action'},
                ],
                order: [ [ 0, 'desc'] ]
                
            });
            HoldOn.close();
        });
    </script>
@endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}