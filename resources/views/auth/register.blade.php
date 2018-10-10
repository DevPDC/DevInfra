@extends('layouts.reg')

@section('content')     
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ route('/') }}"><b>Admin</b>LTE</a>
            </div>
            
            <div class="register-box-body">
                <p class="login-box-msg">Register a new membership</p>

                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback{{ $errors->has('user_idno') ? ' has-error' : '' }}">
                            <input id="user_idno" type="text" class="form-control" name="user_idno" value="{{ old('user_idno') }}" placeholder="EmployeeID" required autofocus>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                            @if ($errors->has('user_idno'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_idno') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required placeholder="Username">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>

                        
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                <a href="login.html" class="text-center">I already have a membership</a>
            </div>
                <!-- /.form-box -->
        </div>
        <!-- /.register-box -->
                
@endsection
