@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')

    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/editprofile.css') !!}">
    <!-- Content Wrapper. Contains page content -->
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
                                {!! Form::open(array('class' => 'form form-horizontal')) !!}

                                <div class="form-group">
                                    {!! Form::label('profile', 'Profile Picture', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-4">
                                        <img class="img-responsive thumbnail" src="{{ asset('dist/img/avatar5.png') }}" alt="User profile picture">
                                        {!! Form::file('profile_pic') !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('company_name', 'Company Name', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('company_desc', 'Company Description', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::textarea('company_desc', null, ['class' => 'form-control textarea-desc', 'placeholder' => 'Company Description']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('company_address', 'Company Address', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('company_address', null, ['class' => 'form-control', 'placeholder' => 'Company Address']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                  {!! Form::label('company_email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
                                  <div class="col-sm-9">
                                        {!! Form::text('company_email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                  </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('website', 'Website', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Website']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('country', 'Country', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Country']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('zipcode', 'Zip Code', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('zipcode', null, ['class' => 'form-control', 'placeholder' => 'Zip Code']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('faxnumber', 'Fax Number', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('faxnumber', null, ['class' => 'form-control', 'placeholder' => 'Fax Number']) !!}
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
            <div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
