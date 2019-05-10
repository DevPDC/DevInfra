@extends('layouts.default')
@section('css')
    <style>
        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h1>New Email</h1>
            <hr/>
            @if(isset($customer))
                {!! Form::model($customer,['method'=>'put']) !!}
            @else
                {!! Form::open() !!}
            @endif
            <div class="form-group row required">
                {!! Form::label("to_email","To",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("to_email",null,["class"=>"form-control".($errors->has('to_email')?" is-invalid":""),"autofocus",'placeholder'=>'Email']) !!}
                    {!! $errors->first('to_email','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row required">
                {!! Form::label("subject","Subject",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("subject",null,["class"=>"form-control".($errors->has('subject')?" is-invalid":""),'placeholder'=>'Subject']) !!}
                    {!! $errors->first('subject','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row required">
                {!! Form::label("message","Message",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::textarea("message",null,["class"=>"form-control".($errors->has('message')?" is-invalid":""),'placeholder'=>'Message']) !!}
                    {!! $errors->first('message','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-4">
                    {!! Form::button("Send",["type" => "submit","class"=>"btn btn-primary"])!!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection