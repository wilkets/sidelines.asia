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
                                    @if(!empty($company->user->image))
                                        <img src="{{ asset('img/profilepics/' . $company->user->image) }}" class="img-responsive thumbnail" alt="User profile picture">
                                    @else
                                        <img src="{{ asset('dist/img/avatar-default-company.png') }}" class="img-responsive thumbnail" alt="User profile picture">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    @if(Auth::check())
                                        @if(Auth::user()->id === $company->user->id)
                                            <a href="{{ URL::to('/' . $company->user->id) . '/edit' }}"><i class="fa fa-edit pull-right"> Edit </i></a>
                                        @endif
                                    @endif
                                    <h3 class="profile-username"> {{ $company->name  }} </h3>

                                    <strong>Address</strong>
                                    <p class="text-muted">
                                        {{ $company->address }}
                                    </p>

                                    <strong>Contact</strong>
                                    <p class="text-muted">
                                        {{ $company->tel_no }}
                                    </p>

                                    <strong>Email</strong>
                                    <p class="text-muted">
                                        {{ $company->user->email }}
                                    </p>

                                    @if(!empty($company->website))
                                        <strong>Website</strong>
                                        <p class="text-muted">
                                            {{ $company->website }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    @if(!empty($company->description))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-user-plus margin-r-5"></i>About {{ $company->name }}</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <p>
                                    {{ $company->description }}
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
