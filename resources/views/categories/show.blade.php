@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
    @section('title',"$cat->category_name")
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title',"Categories  /  $cat->category_name")
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-table"></i>
                        <strong>Service Request</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped dataTable" id="dataTable">
                            <thead>
                                <th>#</th>
                                <th>Requester</th>
                                <th>Category</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Date of Request</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                {{-- @foreach ($catposts as $post)
                                    <tr>
                                        <td style="min-width: 5%;">{{ $post->id }}</td>
                                        <td style="min-width: 10%;"><a href="{{ route('profile.show', $post->user_id) }}" class="btn btn-info btn-sm"><i class="fa fa-user"></i> {{ $post->user_id }}</a></td>
                                        <td style="min-width: 15%;">{{ $post->category->category_name }}</td>
                                        <td style="min-width: 35%;">{{ $post->request_details }}</td>
                                        <td style="min-width: 10%;">
                                            @if($post->status->status_name === 'Pending')
                                                <a href="{{ route('status.show', $post->status_id) }}" class="label bg-navy">{{$post->status->status_name}}</a>
                                            @elseif($post->status->status_name === 'Rendering Service')
                                                <a href="{{ route('status.show', $post->status_id) }}" class="label label-primary">{{$post->status->status_name}}</a>
                                            @elseif($post->status->status_name === 'Under Inspection')
                                                <a href="{{ route('status.show', $post->status_id) }}" class="label label-primary">{{$post->status->status_name}}</a>
                                            @elseif($post->status->status_name === 'Service Completed')
                                                <a href="{{ route('status.show', $post->status_id) }}" class="label label-success">{{$post->status->status_name}}</a>
                                            @elseif($post->status->status_name === 'Unfiltered')
                                                <a href="{{ route('status.show', $post->status_id) }}" class="label label-danger">{{$post->status->status_name}}</a>
                                            @elseif($post->status->status_name === 'Paused Service')
                                                <a href="{{ route('status.show', $post->status_id) }}" class="label label-warning">{{$post->status->status_name}}</a>
                                            @elseif($post->status->status_name === 'Need Materials')
                                                <a href="{{ route('status.show', $post->status_id) }}" class="label label-primary">{{$post->status->status_name}}</a>
                                            @elseif($post->status->status_name === 'Service Completed')
                                                <a href="{{ route('status.show', $post->status_id) }}" class="label label-success">{{$post->status->status_name}}</a>
                                            @elseif($post->status->status_name === 'Completed & Evaluated')
                                               <a href="{{ route('status.show', $post->status_id) }}" class="label label-success">{{$post->status->status_name}}</a>
                                            @elseif($post->status->status_name === 'Received')
                                                <a href="{{ route('status.show', $post->status_id) }}" class="label label-primary">{{$post->status->status_name}}</a>
                                            @endif
    
                                        </td>
                                        <td style="min-width: 15%;">{{ $post->created_at }}</td>
                                        <td style="min-width: 10%;"><a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a></td>
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
        <script src="{{ asset('coreui/js/dataTables.js') }}"></script>
        <script src="{{ asset('coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('coreui/js/dataTable-function.js') }}"></script>
        <script>    
                $(document).ready(function() {
                    $('.dataTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: '{{ asset('api/allPostsInCategory') }}',
                            data: {
                                id: '{{ $cat->id }}',
                                token: '{{ csrf_token() }}'
                            }
                        }
                    })
                });
        </script>
    @endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}