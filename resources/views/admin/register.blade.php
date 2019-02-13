@extends('auth.masterreg')
@section('title', 'Register')

@section('content')
    <div class="register-box" style="margin-top: 138px;">
      <div class="register-box-body">

        <p class="register-box-msg">Register as Admin</p>

        <!-- Open Form -->
        {!! Form::open(array('url' => 'register', 'class' => 'form')) !!}

              <div class="form-group has-feedback">

                  {!! Form::text('email', null, ['required','class'=>'form-control','placeholder'=>'Admin Username']) !!}
                  {!! $errors->first('email'), '<span class="help-block"></span>' !!}
                <span class="fa fa-paper-plane-o form-control-feedback"></span>
              </div>

              <!-- Div for Email Closed -->

              <div class="form-group has-feedback">
                  <div class="error {{ $errors->has('password') ? 'has-error' : '' }}">
                        {!! Form::password('password', ['required','class' => 'form-control','placeholder'=>'Password']) !!}
                        {!! $errors->first('password'), '<span class="help-block"></span>' !!}
                  </div>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <!-- Div for Password Closed -->

              <div class="form-group has-feedback">

                  <div class="error {{ $errors->has('key_code') ? 'has-error' : '' }}">
                        {!! Form::text('admin_code', null, ['required','class' => 'form-control','placeholder'=>'Admin Code']) !!}
                        {!! $errors->first('admin_code'), '<span class="help-block"></span>' !!}
                  </div>

                  <span class="fa fa-key form-control-feedback"></span>
               </div>
               <!-- Div for Lastname Closed -->

              <div class="row">
                  <div class="col-xs-8">
                      <label class="label-font2">
                          Already have an account?<a href="/login" class="text-center"> Login</a>
                      </label>
                  </div><!-- /.col -->
                  <div class="col-xs-4">
                      {!!  Form::hidden('user_type', 'admin') !!}
                       <!-- no back end for log in -->
                      {!! Form::submit('Register', ['class'=>'btn btn-primary btn-block btn-flat']) !!}

                  </div><!-- /.col -->
              </div><!-- Close Row -->

            {!! Form::close() !!}
            <!-- Close Form -->


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@endsection
