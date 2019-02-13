@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <div class="row">
                <div class="col-md-7 col-md-offset-1">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="row">
                                <div class="col-md-4">
                                    @if(!empty($school->user->image))
                                        <img class="img-responsive thumbnail" src="{{ asset('img/profilepics/' . $school->user->image) }}" alt="User profile picture">
                                    @else
                                        <img src="{{ asset('dist/img/avatar-default-school.png') }}" class="img-responsive thumbnail" alt="User Image">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    @if(Auth::user()->user_type === 'c')
                                        @if(!Auth::user()->userable->partners->contains($school->id))
                                            <button type="submit" class="btn btn-primary pull-right" data-toggle="modal" data-target="#model-{{ $school->id }}" title="Delete">
                                                <i class="fa fa-thumbs-o-up"></i> Partner
                                            </button>

                                            <div class="modal" id="model-{{ $school->id }}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" tabindex="">
                                                <div class="modal-dialog box box-danger" >
                                                    <div class="modal-content">
                                                      <div class="modal-header-del">
                                                          <h3 class="modal-del-text"><center> Are you sure you want to partner <br />{{ $school->name }}? </center></h3>
                                                      </div>
                                                      <div class="modal-footer">
                                                            <center>
                                                                <div class="action-btns2">
                                                                    {!! Form::open(array('route' => 'companies.partner')) !!}

                                                                        {!! Form::hidden('school_id', $school->id) !!}
                                                                        {!! Form::submit('Yes',['class'=>'btn btn-primary btn-del-yes'])!!}

                                                                    {!! Form::close() !!}
                                                                </div>
                                                                <div class="action-btns2">
                                                                    <button type="button" class="btn btn-primary btn-del-no" data-toggle="modal" data-target="#model-{{ $school->id }}">No</button>
                                                                </div>
                                                            </center>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div> <!-- modal close-->
                                        @endif
                                    @endif
                                    <h3 class="profile-username"> {{ $school->name  }} </h3>

                                    @if(!empty($school->address))
                                        <strong>Address</strong>
                                        <p class="text-muted">
                                            {{ $school->address }}
                                        </p>
                                    @endif

                                    @if(!empty($school->website))
                                        <strong>Website</strong>
                                        <p class="text-muted">
                                            {{ $school->website }}
                                        </p>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Email</strong>
                                            <p class="text-muted">
                                                {{ $school->user->email }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Contact Number</strong>
                                            <p class="text-muted">
                                                {{ $school->tel_no }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    @if(!empty($school->description))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-user-plus margin-r-5"></i>About {{ $school->name }}</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <p>
                                    {{ $school->description }}
                                </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                </div> <!-- col-md- -->

                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-header with-border">
                          <font class="box-title text-muted recom-h"><i class="fa fa-circle-o"></i> Partners </font>
                        </div><!-- /.box-header -->

                        <div class="table-responsive">


                        </div><!-- /.table-responsive -->
                    </div>  <!-- box -->
                </div>  <!-- col-md-4 -->

            </div> <!-- row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
