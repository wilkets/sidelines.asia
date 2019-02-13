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
                                {!! Form::model($company, array('method' => 'put',
                                                             'route' => ['companies.update', $company->id],
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
                                    {!! Form::label('company_name', 'Company Name', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('company_name', $company->name, ['class' => 'form-control', 'placeholder' => 'Company Name']) !!}
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
                                        {!! Form::text('address', $company->address, ['class' => 'form-control', 'placeholder' => 'Company Address']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                         {!! Form::text('email', $company->user->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                    </div>
                                 </div>

                                <div class="form-group">
                                    {!! Form::label('country', 'Country', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('country', $company->country, ['class' => 'form-control', 'placeholder' => 'Country']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('zipcode', 'Zip Code', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('zipcode', $company->zipcode, ['class' => 'form-control', 'placeholder' => 'Zip Code']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('tel_no', 'Contact Number', ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-9">
                                        {!! Form::text('tel_no', $company->tel_no, ['class' => 'form-control', 'placeholder' => 'Contact Number']) !!}
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
