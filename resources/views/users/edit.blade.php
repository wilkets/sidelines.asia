@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->

@if($user_type == 's')

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Personal Info</h3>
                        </div>
                        <div class="box-body">
                            <div class="tab-pane" id="settings">

                            {!! Form::model($student, array('method' => 'put',
                                                            'url' => '/' . $student->user->id,
                                                            'class' => 'form form-horizontal',
                                                            'files' => 'true')) !!}

                                <div class="form-group">
                                    {!! Form::label('profile', 'Profile Picture', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-4">
                                        @if(!empty(Auth::user()->image))
                                            @if(Auth::user()->user_type == 's')
                                                <img class="img-responsive thumbnail" src="{{ asset('img/profilepics/' . $student->user->image) }}" id="output" alt="User profile picture">
                                            @endif
                                        @else
                                            <img src="{{ asset('dist/img/avatar-default.png') }}" id="output" class="img-responsive thumbnail" alt="User profile picture">
                                        @endif
                                        {!! Form::file('file', ['class' => 'image','accept' => 'image/*','onchange'=>'loadFile(event)']) !!}
                                        <p class="file-img">
                                            {!! $errors->first('file'), '<span class="help-block"></span>' !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('fname', 'First Name', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="error col-sm-9 {{ $errors->has('fname') ? 'has-error' : '' }}">
                                        {!! Form::text('fname', $student->fname, ['class' => 'form-control', 'placeholder' => 'First Name', 'required']) !!}
                                        {!! $errors->first('fname'), '<span class="help-block"></span>' !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('mname', 'Middle Name', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="error col-sm-9 {{ $errors->has('mname') ? 'has-error' : '' }}">
                                        {!! Form::text('mname', $student->mname, ['class' => 'form-control', 'placeholder' => 'Middle Name']) !!}
                                        {!! $errors->first('mname'), '<span class="help-block"></span>' !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('lname', 'Last Name', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="error col-sm-9 {{ $errors->has('lname') ? 'has-error' : '' }}">
                                        {!! Form::text('lname', $student->lname, ['class' => 'form-control', 'placeholder' => 'Last Name',  'required']) !!}
                                        {!! $errors->first('lname'), '<span class="help-block"></span>' !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('address', 'Address', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('address', $student->address, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Date of birth', 'Birth Date', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="error col-sm-6 {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                                        {!! Form::text('date_of_birth', $student->date_of_birth, ['class' => 'form-control', 'placeholder' => 'yyyy-mm-dd',  'required']) !!}
                                        {!! $errors->first('date_of_birth'), '<span class="help-block"></span>' !!}
                                    </div>
                                    {!! Form::label('contact_no', 'Contact', ['class' => 'col-sm-1 control-label']) !!}
                                    <div class="error col-sm-2 {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                                        {!! Form::text('contact_no', $student->contact_no, ['class' => 'form-control', 'placeholder' => 'Contact']) !!}
                                        {!! $errors->first('contact_no'), '<span class="help-block"></span>' !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                   {!! Form::label('schools', 'School', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                          {!! Form::select('school_id',
                                                            $schools,
                                                            null,
                                                            ['id' => 'selectschool',
                                                             'placeholder' => '',
                                                            'class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                   {!! Form::label('degree', 'Degree', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-6">
                                          {!! Form::select('degree_id',
                                                            $degrees,
                                                            null,
                                                            [ 'id' => 'selectcourse',
                                                            'placeholder' => '',
                                                            'required',
                                                            'class'=>'form-control'
                                                            ]) !!}
                                    </div>
                                    {!! Form::label('year', 'Year', ['class' => 'col-sm-1 control-label']) !!}
                                    <div class="error col-sm-2 {{ $errors->has('yr_lvl') ? 'has-error' : '' }}">
                                        {!! Form::number('yr_lvl', $student->yr_lvl, ['class' => 'form-control', 'placeholder' => 'Year', 'min' => 1, 'max' => 10]) !!}
                                        {!! $errors->first('yr_lvl'), '<span class="help-block"></span>' !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('gender', 'Gender', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                            @if($student->gender === 'm')
                                                <label class="label-font">
                                                    {!! Form::radio('gender', 'm', true, ['class'=>'form-control-gender','required']) !!} Male
                                                </label>
                                                <label class="label-font">
                                                    {!! Form::radio('gender', 'f', false, ['class'=>'form-control-gender','required']) !!} Female
                                                </label>
                                            @else
                                            <label class="label-font">
                                                {!! Form::radio('gender', 'm', false, ['class'=>'form-control-gender','required']) !!} Male
                                            </label>
                                            <label class="label-font">
                                                {!! Form::radio('gender', 'f', true, ['class'=>'form-control-gender','required']) !!} Female
                                            </label>
                                            @endif
                                        </label>
                                    </div>
                                </div>

                                <div class="page-header with-border">
                                    <h4 class="box-title"> About Me</h4>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('aboutme', 'About Me', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::textarea('about_me', 'About Me', ['class' => 'textarea form-control']) !!}
                                 </div>

                                </div>

                                <div class="form-group">
                                  {!! Form::label('skill_list', 'Skills', ['class' => 'col-sm-2 control-label']) !!}
                                  <div class="col-sm-9">
                                          {!! Form::select('skill_list[]',
                                                            $skills,
                                                            null,
                                                            ['class' => 'form-control',
                                                            'id' => 'selectskill',
                                                            'multiple']) !!}
                                    </div>
                                </div>

                                <div class="page-header with-border">
                                    <h4 class="box-title"> Educational Background </h4>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('education', 'Education', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::textarea('education', $student->education, ['class' => 'form-control', 'placeholder' => 'Type here!']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('achievements', 'Achievements', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::textarea('achievements', $student->achievements, ['class' => 'form-control', 'placeholder' => 'Type here!']) !!}
                                    </div>
                                </div>

                                <div class="box-header page-header with-border">
                                    <h3 class="box-title"> Seminars Attended </h3>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('seminars', 'Seminars', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::textarea('seminars', $student->seminars, ['class' => 'form-control', 'placeholder' => 'Type here!']) !!}
                                    </div>
                                </div>


                                <div class="box-header page-header with-border">
                                    <h4 class="box-title"> Organizations Attended </h4>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('organizations', 'Organization', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::textarea('organizations', $student->organizations, ['class' => 'form-control', 'placeholder' => 'Type here!']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        {!! Form::submit('Save Changes', ['class'=>'btn btn-primary']) !!}
                                        <a href="{{ URL::to('/' . Auth::user()->id) }}" class="btn btn-danger btn-cancel">Cancel</a>
                                    </div>
                                </div>
                              {!! Form::close() !!}
                            </div><!-- /.tab-pane -->
                        </div> <!-- box-body -->
                    </div> <!-- box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


@elseif($user_type == 'c')

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Profile</h3>
                        </div>
                        <div class="box-body">
                            <div class="tab-pane" id="settings">

                                {!! Form::model($company, array('method' => 'put',
                                                             'url' => '/' . $company->user->id,
                                                             'class' => 'form form-horizontal',
                                                             'files' => 'true')) !!}


                                <div class="form-group">
                                    {!! Form::label('logo', 'Company Logo', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-4">
                                        @if(!empty(Auth::user()->image))
                                          @if(Auth::user()->user_type == 'c')
                                              <img src="{{ asset('img/profilepics/' . Auth::user()->image) }}" id="output" class="img-responsive thumbnail" alt="User Image">
                                          @endif
                                        @else
                                          <img src="{{ asset('dist/img/avatar-default-company.png') }}" id="output" class="img-responsive thumbnail" alt="User Image">
                                        @endif

                                        {!! Form::file('file', ['class' => 'image','accept' => 'image/*','onchange'=>'loadFile(event)']) !!}
                                        <p class="file-img">
                                            {!! $errors->first('file'), '<span class="help-block"></span>' !!}
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('name', 'Company Name', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('name', $company->name, ['class' => 'form-control', 'placeholder' => 'Company Name','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('description', 'Company Description', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::textarea('description', $company->description, ['class' => 'form-control textarea-desc', 'placeholder' => 'Company Description']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('address', 'Company Address', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('address', $company->address, ['class' => 'form-control', 'placeholder' => 'Company Address','required']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('country', 'Country', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="error col-sm-9 {{ $errors->has('country') ? 'has-error' : '' }}">
                                        {!! Form::text('country', $company->country, ['class' => 'form-control', 'placeholder' => 'Country','required']) !!}
                                        {!! $errors->first('country'), '<span class="help-block"></span>' !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('tel_no', 'Contact Number', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="error col-sm-4 {{ $errors->has('tel_no') ? 'has-error' : '' }}">
                                        {!! Form::text('tel_no', $company->tel_no, ['class' => 'form-control', 'placeholder' => 'Contact Number','required']) !!}
                                        {!! $errors->first('tel_no'), '<span class="help-block"></span>' !!}
                                    </div>
                                    {!! Form::label('zipcode', 'Zip Code', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-3">
                                        {!! Form::text('zipcode', $company->zipcode, ['class' => 'form-control', 'placeholder' => 'Zip Code']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('website', 'Website', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="error col-sm-9 {{ $errors->has('website') ? 'has-error' : '' }}">
                                        {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => '(e.g. https://www.yoursite.com)']) !!}
                                        {!! $errors->first('website'), '<span class="help-block"></span>' !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        {!! Form::submit('Save Changes',['class'=>'btn btn-primary']) !!}
                                        <a href="{{ URL::to('/' . Auth::user()->id) }}" class="btn btn-danger btn-cancel">Cancel</a>
                                    </div>
                                </div>
                              {!! Form::close() !!}
                            </div><!-- /.tab-pane -->
                        </div> <!-- box-body -->
                    </div> <!-- box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@elseif($user_type == 'f' || $user_type === 'd')

    <div class="content-wrapper"
        <!-- Main content -->
        <div class="row">
            <section class="content">
               <!-- left column -->
               <div class="col-md-offset-1 col-md-10">
                 <!-- general form elements -->
                 <div class="box box-primary">
                       <div class="box-header with-border">
                         <h3 class="box-title">Edit Profile</h3>
                       </div><!-- /.box-header -->
                       <!-- form start -->
                         <div class="box-body">
                             <div class="tab-pane" id="settings">
                                 {!! Form::model($faculty, array('method' => 'put',
                                                                 'url' => '/' . $faculty->user->id,
                                                                 'class' => 'form form-horizontal',
                                                                 'files' => 'true'
                                                             )) !!}

                                      <div class="form-group">
                                          {!! Form::label('profile','Profile Pictures',array('for'=>'inputName','class'=>'col-sm-2 control-label')) !!}
                                          <div class="col-md-4">
                                              @if(!empty(Auth::user()->image))
                                                @if(Auth::user()->user_type == 'f' || Auth::user()->user_type == 'd')
                                                    <img src="{{ asset('img/profilepics/' . Auth::user()->image) }}" id="output" class="img-responsive thumbnail" alt="User Image">
                                                @endif
                                              @else
                                                <img src="{{ asset('dist/img/avatar-default.png') }}" id="output" class="img-responsive thumbnail" alt="User Image">
                                              @endif
                                             {!! Form::file('file', ['class' => 'image','accept' => 'image/*','onchange'=>'loadFile(event)']) !!}

                                              <p class="file-img">
                                                  {!! $errors->first('file'), '<span class="help-block"></span>' !!}
                                              </p>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                        {!! Form::label('fname', 'First Name', array('for'=>'inputFname','class'=>'col-sm-2 control-label')) !!}
                                        <div class="error col-sm-9 {{ $errors->has('fname') ? 'has-error' : '' }}">
                                            {!! Form::text('fname', $faculty->fname, array('class'=>'form-control', 'id'=>'inputFname', 'placeholder' => 'First Name', 'required')) !!}
                                            {!! $errors->first('fname'), '<span class="help-block"></span>' !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        {!! Form::label('mname', 'Middle Name', array('for'=>'inputMname','class'=>'col-sm-2 control-label')) !!}
                                        <div class="error col-sm-9 {{ $errors->has('mname') ? 'has-error' : '' }}">
                                          {!! Form::text('mname', $faculty->mname, array('class'=>'form-control', 'id'=>'inputMname', 'placeholder' => 'Middle Name')) !!}
                                          {!! $errors->first('mname'), '<span class="help-block"></span>' !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          {!! Form::label('lname', 'Last Name',array('class'=>'col-sm-2 control-label','for'=>'inputLname')) !!}
                                        <div class="error col-sm-9 {{ $errors->has('lname') ? 'has-error' : '' }}">
                                          {!! Form::text('lname', $faculty->lname, array('class'=>'form-control', 'placeholder' => 'Last Name', 'required')) !!}
                                          {!! $errors->first('lname'), '<span class="help-block"></span>' !!}
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          {!! Form::label('address', 'Address', ['class' => 'col-sm-2 control-label']) !!}
                                          <div class="col-sm-9">
                                              {!! Form::text('address', $faculty->address, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                                          </div>
                                      </div>


                                      <div class="form-group">
                                          {!! Form::label('date_of_birth', 'Birth Date', ['class' => 'col-sm-2 control-label']) !!}
                                          <div class="error col-sm-6 {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                                              {!! Form::text('date_of_birth', $faculty->date_of_birth, ['class' => 'form-control', 'placeholder' => 'yyyy-mm-dd',  'required']) !!}
                                              {!! $errors->first('date_of_birth'), '<span class="help-block"></span>' !!}
                                          </div>
                                          {!! Form::label('contact_no', 'Contact', ['class' => 'col-sm-1 control-label']) !!}
                                          <div class="error col-sm-2 {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                                              {!! Form::text('contact_no', $faculty->contact_no, ['class' => 'form-control', 'placeholder' => 'Contact','required']) !!}
                                              {!! $errors->first('contact_no'), '<span class="help-block"></span>' !!}
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          {!! Form::label('gender', 'Gender', ['class' => 'col-sm-2 control-label']) !!}
                                          <div class="col-sm-9">
                                                  @if($faculty->gender === 'm')
                                                      <label class="label-font">
                                                          {!! Form::radio('gender', 'm', true, ['class'=>'form-control-gender','required']) !!} Male
                                                      </label>
                                                      <label class="label-font">
                                                          {!! Form::radio('gender', 'f', false, ['class'=>'form-control-gender','required']) !!} Female
                                                      </label>
                                                  @else
                                                  <label class="label-font">
                                                      {!! Form::radio('gender', 'm', false, ['class'=>'form-control-gender','required']) !!} Male
                                                  </label>
                                                  <label class="label-font">
                                                      {!! Form::radio('gender', 'f', true, ['class'=>'form-control-gender','required']) !!} Female
                                                  </label>
                                                  @endif
                                              </label>
                                          </div>
                                      </div>


                                      <div class="page-header with-border">
                                          <h4 class="box-title"> About Me</h4>
                                      </div>

                                      <div class="form-group">
                                          {!! Form::label('aboutme', 'About Me', ['class' => 'col-sm-2 control-label']) !!}
                                          <div class="col-sm-9">
                                              {!! Form::textarea('about_me', $faculty->about_me, ['class' => 'form-control', 'placeholder' => 'Type here!']) !!}
                                          </div>
                                      </div>

                                      <div class="page-header with-border">
                                          <h4 class="box-title"> Educational Background </h4>
                                      </div>

                                      <div class="form-group">
                                          {!! Form::label('education', 'Education', ['class' => 'col-sm-2 control-label']) !!}
                                          <div class="col-sm-9">
                                              {!! Form::textarea('education', $faculty->education, ['class' => 'form-control', 'placeholder' => 'Type here!']) !!}
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          {!! Form::label('achievements', 'Achievements', ['class' => 'col-sm-2 control-label']) !!}
                                          <div class="col-sm-9">
                                              {!! Form::textarea('achievements', $faculty->achievements, ['class' => 'form-control', 'placeholder' => 'Type here!']) !!}
                                          </div>
                                      </div>

                                      <div class="box-header page-header with-border">
                                          <h3 class="box-title"> Seminars Attended </h3>
                                      </div>

                                      <div class="form-group">
                                          {!! Form::label('seminars', 'Seminars', ['class' => 'col-sm-2 control-label']) !!}
                                          <div class="col-sm-9">
                                              {!! Form::textarea('seminars', $faculty->seminars, ['class' => 'form-control', 'placeholder' => 'Type here!']) !!}
                                          </div>
                                      </div>


                                      <div class="box-header page-header with-border">
                                          <h4 class="box-title"> Organizations Attended </h4>
                                      </div>

                                      <div class="form-group">
                                          {!! Form::label('organizations', 'Organization', ['class' => 'col-sm-2 control-label']) !!}
                                          <div class="col-sm-9">
                                              {!! Form::textarea('organizations', $faculty->organizations, ['class' => 'form-control', 'placeholder' => 'Type here!']) !!}
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-sm-offset-2 col-sm-10">
                                              {!! Form::submit('Save Changes', ['class'=>'btn btn-primary']) !!}
                                              <a href="{{ URL::to('/' . Auth::user()->id) }}" class="btn btn-danger btn-cancel">Cancel</a>
                                          </div>
                                      </div>
                                 {!! Form::close() !!}
                             </div><!-- end of tab-pane -->
                       </div> <!-- end of box-body -->
                    </div><!-- /.box -->
                </div> <!-- col-md-offset-1 col-md-11 -->
            </section> <!-- end of section -->
        </div> <!-- end of row  -->
    </div> <!-- end of content-wrapper -->

@elseif($user_type == 'sa')

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Profile</h3>
                        </div>
                        <div class="box-body">
                            <div class="tab-pane" id="settings">
                                {!! Form::model($school, array('method' => 'put',
                                                             'url' => '/' . $school->user->id,
                                                             'class' => 'form form-horizontal',
                                                             'files' => 'true')) !!}


                                <div class="form-group">
                                    {!! Form::label('logo', 'School Logo', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-4">
                                        @if(!empty(Auth::user()->image))
                                            @if(Auth::user()->user_type == 'sa')
                                                <img class="img-responsive thumbnail" src="{{ asset('img/profilepics/' . $school->user->image) }}" id="output" alt="User profile picture">
                                            @endif
                                        @else
                                            <img src="{{ asset('dist/img/avatar-default-school.png') }}" id="output" class="img-responsive thumbnail" alt="User profile picture">
                                         @endif
                                        {!! Form::file('file', ['class' => 'image','accept' => 'image/*','onchange'=>'loadFile(event)']) !!}
                                        <p class="file-img">
                                            {!! $errors->first('file'), '<span class="help-block"></span>' !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('school_name', 'School Name', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('name', $school->name, ['class' => 'form-control', 'placeholder' => 'School Name','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('description', 'School Description', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::textarea('description', $school->description, ['class' => 'form-control textarea-desc', 'placeholder' => 'School Description']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('address', 'School Address', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('address', $school->address, ['class' => 'form-control', 'placeholder' => 'School Address','required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('country', 'Country', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="error col-sm-9 {{ $errors->has('country') ? 'has-error' : '' }}">
                                        {!! Form::text('country', $school->country, ['class' => 'form-control', 'placeholder' => 'Country','required']) !!}
                                        {!! $errors->first('country'), '<span class="help-block"></span>' !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('zipcode', 'Zip Code', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('zipcode', $school->zipcode, ['class' => 'form-control', 'placeholder' => 'Zip Code']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('tel_no', 'Contact Number', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="error col-sm-9 {{ $errors->has('tel_no') ? 'has-error' : '' }}">
                                        {!! Form::text('tel_no', $school->tel_no, ['class' => 'form-control', 'placeholder' => 'Contact Number','required']) !!}
                                        {!! $errors->first('tel_no'), '<span class="help-block"></span>' !!}
                                    </div>
                                </div>


                                <div class="form-group">
                                    {!! Form::label('website', 'Website', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="error col-sm-9 {{ $errors->has('website') ? 'has-error' : '' }}">
                                        {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => '(e.g. https://www.yoursite.com)']) !!}
                                        {!! $errors->first('website'), '<span class="help-block"></span>' !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        {!! Form::submit('Save Changes',['class'=>'btn btn-primary']) !!}
                                        <a href="{{ URL::to('/' . Auth::user()->id) }}" class="btn btn-danger btn-cancel">Cancel</a>
                                    </div>
                                </div>
                              {!! Form::close() !!}
                            </div><!-- /.tab-pane -->
                        </div> <!-- box-body -->
                    </div> <!-- box -->
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endif




@endsection
