@extends('layouts.master')
@section('title', 'Sidelines')
@section('content')

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
                                                             'route' => ['faculties.update', $faculty->id],
                                                             'class' => 'form form-horizontal',
                                                             'files' => 'true')) !!}

                                  <div class="form-group">
                                      {!! Form::label('profile','Profile Pictures',array('for'=>'inputName','class'=>'col-sm-2 control-label')) !!}
                                      <div class="col-sm-4">
                                          <img class="img-responsive thumbnail" src="{{ asset('img/profilepics/' . $faculty->user->image) }}" alt="User profile picture">
                                          {!! Form::file('image') !!}
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    {!! Form::label('fname', 'First Name', array('for'=>'inputFname','class'=>'col-sm-2 control-label')) !!}
                                    <div class="col-sm-9">
                                     {!! Form::text('fname', $faculty->fname, array('class'=>'form-control', 'id'=>'inputFname')) !!}
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    {!! Form::label('mname', 'Middle Name', array('for'=>'inputMname','class'=>'col-sm-2 control-label')) !!}
                                    <div class="col-sm-9">
                                      {!! Form::text('mname', $faculty->mname, array('class'=>'form-control', 'id'=>'inputMname')) !!}
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('lname', 'Last Name',array('class'=>'col-sm-2 control-label','for'=>'inputLname')) !!}
                                    <div class="col-sm-9">
                                      {!! Form::text('lname', $faculty->lname, array('class'=>'form-control')) !!}
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('address', 'Address', ['class' => 'col-sm-2 control-label']) !!}
                                      <div class="col-sm-9">
                                          {!! Form::text('address', $faculty->address, ['class' => 'form-control', 'placeholder' => 'Address'],  'required') !!}
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      {!! Form::label('dob', 'Birth Date', ['class' => 'col-sm-2 control-label']) !!}
                                      <div class="col-sm-9">
                                          {!! Form::text('dob', $faculty->date_of_birth, ['class' => 'form-control', 'placeholder' => 'yyyy-mm-dd',  'required']) !!}
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

                                  <div class="form-group">
                                      {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
                                      <div class="col-sm-6">
                                          {!! Form::text('email', $faculty->user->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    									</div>
    									{!! Form::label('contact_no', 'Contact', ['class' => 'col-sm-1 control-label']) !!}
    									<div class="col-sm-2">
    										{!! Form::text('contact_no', $faculty->contact_no, ['class' => 'form-control', 'placeholder' => 'Contact']) !!}
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

@endsection
