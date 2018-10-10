@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
    @section('title','Infrastructures')
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title','Infrastructures')
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
            <div class="col-md-3">
                <div class="card card-info">
                    <div class="card-header">
                        <i class="fa fa-plus-square"></i>
                        <strong>Add New Infrastructure Category</strong>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'infrastructure.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
                            {{ Form::label('infra_name', 'Name of Category:') }}
                            {{ Form::text('infra_name', '', ['class' => 'form-control', 'required' => '', 'autofocus' => '', 'placeholder' => 'Enter Category Name']) }}
                            <br>
                            {{ Form::label('infra_abbr', 'Abbreviation:') }}
                            {{ Form::text('infra_abbr', '', ['class' => 'form-control', 'maxlength' => '10', 'placeholder' => 'Category Abbreviation']) }}
                            <br>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-ladda ladda-button pull-right" data-style="contract"><span class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-building-o"></i>
                        <strong>Facilities</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped" id="dataTable">
                            <thead>
                                <th>#</th>
                                <th>Infrastructure Name</th>
                                <th>Infrastructure Abbreviation</th>
                                <th># of facilities</th>
                                <th></th>
                            </thead>
                            <th>
                                <tbody>
                                    @foreach ($infrastructures as $infra)
                                        <tr>
                                            <td>{{ $infra->id }}</td>
                                            <td>
                                            <a href="{{ route('infrastructure.show', $infra->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-title="View Details"><i class="fa fa-eye"></i> {{ $infra->infra_name }}</a>
                                            </td>
                                            <td>{{ $infra->infra_abbr }}</td>
                                            <td><span class="label label-primary">{{ $infra->facility()->count() }}</span></td>
                                            <td>
                                                {!! Form::open(['route' => ['infrastructure.destroy', $infra->id], 'method' => 'DELETE']) !!}
                                                    {{ Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) }}
                                                {!! Form::close() !!}
                                                
                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </th>
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

    @endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}