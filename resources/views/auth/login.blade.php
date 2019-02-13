@extends('auth.masterlogin')
@section('title', 'Sidelines')

@section('content')

  <div class="login-box">
    <div class="login-logo">
      <a href="/login"> <img src="/dist/img/sidelogo.png" class="sidelogo img-responsive"/></a>
    </div><!-- login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in</p>

        {!! Form::open(array('url' => '/login', 'class' => 'form')) !!}
        <!-- Open Form -->
          <div class="form-group has-feedback">

                  {!! Form::text('email', null, ['required','class'=>'form-control','placeholder'=>'Email']) !!}

            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
           <!-- Div for Email Closed -->

          <div class="form-group has-feedback">

              {!! Form::password('password', ['required','class'=>'form-control','placeholder'=>'Password']) !!}

            <span class="fa fa-lock form-control-feedback" style="font-size: 19px;"></span>
          </div>
          <!-- Div for Password Closed -->
          @if(!empty($errors->all()))
            <div class="alert alert-danger alert-dismissable">
              {{ $errors->first() }}
            </div>
          @endif
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                    <a href="preregister" class="text-center">Register</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                {!!  Form::hidden('remember', 'remember') !!}
                 <!-- no back end for log in -->
                {!! Form::submit('Sign in', ['class'=>'btn btn-primary btn-block btn-flat']) !!}
              </div><!-- /.col -->
          </div><!-- Close Row -->

          {!! Form::close() !!}
          <!-- Close Form -->

          <a href="#" class="text-center">Forgot Password</a>
          <a href="/" class="pull-right hidden-xs" style="margin-right:3px;"><i class="fa fa-search" style="font-size:11px;"></i>View Jobs</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->


@endsection
