@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
    @section('title','Categories')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title')
    <li class="breadcrumb-item">
        Categories
    </li>
@endsection
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
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-plus-square"></i>
                    <strong>Add New Category</strong>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                    {!! Form::open(['route' => 'category.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
                    <div class="card-body">
                        {{ Form::label('category_name', 'Category Name:') }}
                        <div class="input-group">
                            {{ Form::text('category_name', '', ['class' => 'form-control', 'placeholder' => 'Enter Category Name...', 'required' => '', 'maxlength' => '25']) }}
                        </div>
                        <br>
                        {{ Form::label('category_abbr', 'Category Abbreviation:') }}
                        <div class="input-group">
                            {{ Form::text('category_abbr', '', ['class' => 'form-control', 'placeholder' => 'Enter Abbreviation...', 'maxlength' => '15']) }}
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    {!! Form::close() !!}
            </div>
                  <!-- /.box -->
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <i class="icons font-2xl mt-5 cui-cursor"></i>
                    <strong>List of Service Categories</strong>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Category Abbr</th>
                            <th># of requests</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_abbr }}</td>
                                    <td>{{ $category->posts()->count() }}</td>
                                    <td>
                                        <span class="pull-right">
                                            {!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'DELETE']) !!}
                                                {{ Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) }}
                                                <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            {!! Form::close() !!}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
                  <!-- /.box -->
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