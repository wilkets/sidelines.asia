@extends('auth.masterreg')
@section('title', 'Register')

@section('content')

@if(Session::get('user_type') === 'student' || Input::old('user_type') === 'student')
  <div class="register-box">
      <div class="register-box-body">

        <p class="register-box-msg"> Register as Student </p>

        <!-- Open Form -->
        {!! Form::open(array('url' => 'register', 'class' => 'form')) !!}

            <div class="form-group has-feedback">
                <div class="error {{ $errors->has('lname') ? 'has-error' : '' }}">

                      {!! Form::text('lname', null, ['required','class'=>'form-control','placeholder'=>'Lastname']) !!}
                      {!! $errors->first('lname'), '<span class="help-block"></span>' !!}
                     <span class="glyphicon glyphicon-user form-control-feedback"></span>

                </div>
              </div>
              <!-- Div for Lastname Closed -->

               <div class="form-group has-feedback">
                   <div class="error {{ $errors->has('fname') ? 'has-error' : '' }}">

                       {!! Form::text('fname', null, ['required','class'=>'form-control','placeholder'=>'Firstname']) !!}
                       {!! $errors->first('fname'), '<span class="help-block"></span>' !!}
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    </div>
               </div>
               <!-- Div for Firstname Closed -->

               <div class="form-group has-feedback">

                 <div class="error {{ $errors->has('email') ? 'has-error' : '' }}">
                       {!! Form::text('email', null, ['required','class' => 'form-control','placeholder'=>'E-mail Address']) !!}
                       {!! $errors->first('email'), '<span class="help-block"></span>' !!}
                 </div>


                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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
          <div class="form-group has-feedback " >
              @if(Session::has('schools'))
                {!! Form::select('schools', Session::get('schools'), null,
                                    ['class' => 'form-control',
                                    'placeholder'=>'Select School',
                                    'required','style'=>'margin-left:-1px;'
                                    ]) !!}
              @else
                {!! Form::select('schools', json_decode(Input::old('list_of_schools')), null,
                                    ['class' => 'form-control',
                                    'placeholder'=>'Select School',
                                    'required'
                                    ]) !!}
              @endif
          </div>
          <!-- Div for Password Closed -->
          <div class="form-group has-feedback form-control-1">

              <font color="#BBB" class="bdate">Birthdate: </font>

              {!! Form::selectMonth('month',  ['class'=>'form-control'],['placeholder'=>'Month','required']) !!}
              {!! Form::selectRange('day', 1, 31, ['class'=>'form-control'],['placeholder'=>'Day','required']) !!}
              {!! Form::selectRange('year', 1970, 2016, ['class'=>'form-control'],['placeholder'=>'Year','required']) !!}

          </div>
            <!-- Div for birthdate Closed -->

            <div class="form-group has-feedback form-control-2">

                <font color="#BBB" class="gender">Gender: </font>
                <label class="label-font">
                    {!! Form::radio('gender','m', false, ['class'=>'form-control-gender','required']) !!} Male
                </label>
                <label class="label-font">
                    {!! Form::radio('gender','f', false, ['class'=>'form-control-gender','required']) !!} Female
                </label>
            </div>
              <!-- Div for Gender Closed -->

          <div class="row">
              <div class="col-xs-8">
                <div class="icheck">
                    <label class="label-font">
                        {!! Form::checkbox('terms','agree', false,  ['required']) !!}
                        I agree to the<a href="#" class="text-center"> Terms.</a>
                    </label>
                </div>
              </div><!-- /.col -->
              <div class="col-xs-4">
                  {!!  Form::hidden('user_type', 'student') !!}
                  {!!  Form::hidden('list_of_schools', Session::get('schools')) !!}
                   <!-- no back end for log in -->
                  {!! Form::submit('Register', ['class'=>'btn btn-primary btn-block btn-flat']) !!}

              </div><!-- /.col -->
          </div><!-- Close Row -->

            {!! Form::close() !!}
            <!-- Close Form -->
                <label class="label-font2">
                    Already have an account?<a href="login" class="text-center"> Login</a>
                </label>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@elseif(Session::get('user_type') === 'company' || Input::old('user_type') === 'company')

  <div class="register-box" style="margin-top: 138px;">
      <div class="register-box-body">

        <p class="register-box-msg">Register as Company</p>

        <!-- Open Form -->
        {!! Form::open(array('url' => 'register', 'class' => 'form')) !!}

              <div class="form-group has-feedback">

                  {!! Form::text('company_name', null, ['required','class'=>'form-control','placeholder'=>'Company Name']) !!}

                <span class="fa fa-building form-control-feedback"></span>
              </div>
              <!-- Div for Lastname Closed -->

               <div class="form-group has-feedback">

                 <div class="error {{ $errors->has('email') ? 'has-error' : '' }}">
                       {!! Form::text('email', null, ['required','class' => 'form-control','placeholder'=>'E-mail Address']) !!}
                       {!! $errors->first('email'), '<span class="help-block"></span>' !!}
                 </div>


                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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

          <div class="row">
              <div class="col-xs-8">
                <div class="icheck">
                    <label class="label-font">
                        {!! Form::checkbox('terms','agree', false,  ['required']) !!}
                        I agree to the<a href="#" class="text-center"> Terms.</a>
                    </label>
                </div>
              </div><!-- /.col -->
              <div class="col-xs-4">
                  {!!  Form::hidden('user_type', 'company') !!}
                   <!-- no back end for log in -->
                  {!! Form::submit('Register', ['class'=>'btn btn-primary btn-block btn-flat']) !!}

              </div><!-- /.col -->
          </div><!-- Close Row -->

            {!! Form::close() !!}
            <!-- Close Form -->
                <label class="label-font2">
                    Already have an account?<a href="login" class="text-center"> Login</a>
                </label>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@elseif(Session::get('user_type') === 'school_admin' || Input::old('user_type') === 'school')
  <div class="register-box" style="margin-top: 130px;">
      <div class="register-box-body">

        <p class="register-box-msg">Register as School Admin</p>

        <!-- Open Form -->
        {!! Form::open(array('url' => 'register', 'class' => 'form')) !!}

              <div class="form-group has-feedback">

                  {!! Form::text('school_name', null, ['required','class'=>'form-control','placeholder'=>'School Name']) !!}

                <span class="fa fa-university form-control-feedback"></span>
              </div>
              <!-- Div for Lastname Closed -->

               <div class="form-group has-feedback">

                 <div class="error {{ $errors->has('email') ? 'has-error' : '' }}">
                       {!! Form::text('email', null, ['required','class' => 'form-control','placeholder'=>'E-mail Address']) !!}
                       {!! $errors->first('email'), '<span class="help-block"></span>' !!}
                 </div>


                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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
                  {!! Form::text('key_code', null, ['required','class' => 'form-control','placeholder'=>'Key Code']) !!}
                  {!! $errors->first('key_code'), '<span class="help-block"></span>' !!}
            </div>

            <span class="fa fa-key form-control-feedback"></span>
          </div>
         <!-- Div for Keycode Closed -->

          <div class="row">
              <div class="col-xs-8">
                <div class="icheck">
                    <label class="label-font">
                        {!! Form::checkbox('terms','agree', false,  ['required']) !!}
                        I agree to the<a href="#" class="text-center"> Terms.</a>
                    </label>
                </div>
              </div><!-- /.col -->
              <div class="col-xs-4">
                  {!!  Form::hidden('user_type', 'school') !!}
                   <!-- no back end for log in -->
                  {!! Form::submit('Register', ['class'=>'btn btn-primary btn-block btn-flat']) !!}

              </div><!-- /.col -->
          </div><!-- Close Row -->

            {!! Form::close() !!}
            <!-- Close Form -->
                <label class="label-font2">
                    Already have an account?<a href="login" class="text-center"> Login</a>
                </label>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@elseif(Session::get('user_type') === 'dean_faculty' || Input::old('user_type') === '0' || Input::old('user_type') === '1')
      <div class="register-box">
          <div class="register-box-body">

            <p class="register-box-msg">Register as Dean/Faculty</p>

            <!-- Open Form -->
            {!! Form::open(array('url' => 'register', 'class' => 'form')) !!}

                  <div class="form-group has-feedback">
                       <div class="error {{ $errors->has('lname') ? 'has-error' : '' }}">

                            {!! Form::text('lname', null, ['required','class'=>'form-control','placeholder'=>'Lastname']) !!}
                            {!! $errors->first('lname'), '<span class="help-block"></span>' !!}

                      </div>

                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <!-- Div for Lastname Closed -->

                   <div class="form-group has-feedback">
                       <div class="error {{ $errors->has('fname') ? 'has-error' : '' }}">

                           {!! Form::text('fname', null, ['required','class'=>'form-control','placeholder'=>'Firstname']) !!}
                           {!! $errors->first('fname'), '<span class="help-block"></span>' !!}

                       </div>

                     <span class="glyphicon glyphicon-user form-control-feedback"></span>
                   </div>
                   <!-- Div for Firstname Closed -->

                   <div class="form-group has-feedback">

                     <div class="error {{ $errors->has('email') ? 'has-error' : '' }}">
                           {!! Form::text('email', null, ['required','class' => 'form-control','placeholder'=>'E-mail Address']) !!}
                           {!! $errors->first('email'), '<span class="help-block"></span>' !!}
                     </div>

                     <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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

              <div class="form-group has-feedback form-control-1">

                  <font color="#BBB" class="bdate">Birthdate: </font>

                  {!! Form::selectMonth('month',  ['class'=>'form-control'],['placeholder'=>'Month','required']) !!}
                  {!! Form::selectRange('day', 1, 31, ['class'=>'form-control'],['placeholder'=>'Day','required']) !!}
                  {!! Form::selectRange('year', 1970, 2016, ['class'=>'form-control'],['placeholder'=>'Year','required']) !!}

              </div>
                <!-- Div for birthdate Closed -->

            <div class="form-group has-feedback form-control-2">

                <font color="#BBB" class="gender">Gender: </font>
                <label class="label-font">
                    {!! Form::radio('gender','m', false, ['class'=>'form-control-gender','required']) !!} Male
                </label>
                <label class="label-font">
                    {!! Form::radio('gender','f', false, ['class'=>'form-control-gender','required']) !!} Female
                </label>
            </div>
              <!-- Div for Gender Closed -->
              <div class="form-group has-feedback " >
                  @if(Session::has('schools'))
                    {!! Form::select('schools', Session::get('schools'), null,
                                        ['class' => 'form-control',
                                        'placeholder'=>'Select School',
                                        'required','style'=>'margin-left:-1px;'
                                        ]) !!}
                  @else
                    {!! Form::select('schools', json_decode(Input::old('list_of_schools')), null,
                                        ['class' => 'form-control',
                                        'placeholder'=>'Select School',
                                        'required','style'=>'margin-left:-1px;'
                                        ]) !!}
                  @endif
              </div>
              <div class="form-group has-feedback " >

                  {!! Form::select('user_type', ['Dean',
                                      'Faculty'],
                                       null,
                                      ['class' => 'form-control',
                                      'placeholder'=>'Position',
                                      'required','style'=>'margin-left:-1px;'
                                      ]) !!}

              </div>
              <!-- Div for Position Closed -->

              <!-- <div class="form-group has-feedback">

                <div class="error {{ $errors->has('key_code') ? 'has-error' : '' }}">
                      {!! Form::text('key_code', null, ['required','class' => 'form-control','placeholder'=>'Key Code']) !!}
                      {!! $errors->first('key_code'), '<span class="help-block"></span>' !!}
                </div>

                <span class="fa fa-key form-control-feedback"></span>
              </div> -->
             <!-- Div for Keycode Closed -->

              <div class="row">
                  <div class="col-xs-8">
                    <div class="icheck">
                        <label class="label-font">
                            {!! Form::checkbox('terms','agree', false,  ['required']) !!}
                            I agree to the<a href="#" class="text-center"> Terms.</a>
                        </label>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-xs-4">
                       <!-- no back end for log in -->
                      {!!  Form::hidden('list_of_schools', Session::get('schools')) !!}

                      {!! Form::submit('Register', ['class'=>'btn btn-primary btn-block btn-flat']) !!}

                  </div><!-- /.col -->
              </div><!-- Close Row -->

                {!! Form::close() !!}
                <!-- Close Form -->
                    <label class="label-font2">
                        Already have an account?<a href="login" class="text-center"> Login</a>
                    </label>


          </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
@else
    @include('auth.preregister')

@endif

@endsection
