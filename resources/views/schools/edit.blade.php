@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')

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
                                                             'route' => ['school.update', $school->id],
                                                             'class' => 'form form-horizontal',
                                                             'files' => 'true')) !!}


                                <div class="form-group">
                                    {!! Form::label('profile', 'Profile Picture', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-4">
                                        <img class="img-responsive thumbnail" src="{{ asset('img/profilepics/' . $company->user->image) }}" alt="User profile picture">
                                        {!! Form::file('image') !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('school_name', 'School Name', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('school_name', $company->name, ['class' => 'form-control', 'placeholder' => 'School Name']) !!}
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
                                        {!! Form::text('address', $school->address, ['class' => 'form-control', 'placeholder' => 'School Address']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                         {!! Form::text('email', $school->user->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                    </div>
                                 </div>

                                <div class="form-group">
                                    {!! Form::label('country', 'Country', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('country', $school->country, ['class' => 'form-control', 'placeholder' => 'Country']) !!}
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
                                    <div class="col-sm-9">
                                        {!! Form::text('tel_no', $school->tel_no, ['class' => 'form-control', 'placeholder' => 'Contact Number']) !!}
                                    </div>
                                </div>


                                <div class="form-group">
                                    {!! Form::label('website', 'Website', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Website']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        {!! Form::submit('Save',['class' => 'btn btn-danger btn-save']) !!}
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

@endsection
