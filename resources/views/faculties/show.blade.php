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
                                    <img class="img-responsive thumbnail" src="{{ asset('img/profilepics/' . $faculty->user->image) }}" alt="User profile picture">
                                </div>
                                <div class="col-md-8">
                                    <h3 class="profile-username"> {{ $faculty->fname . " " .  $faculty->lname }} - #12103594</h3>

                                    <strong>School Faculty in</strong>
                                    <p class="text-muted">
                                      {{ $faculty->school->name }}
                                    </p>
                                    <strong>Birthdate</strong>
                                    <p class="text-muted">
                                      {{ $faculty->date_of_birth }}
                                    </p>

                                    <strong>Email</strong>
                                    <p class="text-muted">
                                        {{ $faculty->user->email }}
                                    </p>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    @if(!empty($faculty->about_me))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-user-plus margin-r-5"></i>About Me</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <p>
                                    {{ $faculty->about_me }}
                                </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                    @if(!empty($faculty->education))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><i class="fa   fa-graduation-cap margin-r-5"></i>  Education</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <p>
                                    {{ $faculty->education }}
                                </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                    @if(!empty($faculty->achievements))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><i class="fa fa-star margin-r-5"></i>Achievements</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                  <p>
                                      {{ $faculty->achievements }}
                                  </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                    @if(!empty($faculty->achievements))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><i class="fa fa-book margin-r-5"></i>Seminars</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                  <p>
                                      {{ $faculty->seminars }}
                                  </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                    @if(!empty($faculty->achievements))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><i class="fa  fa-users margin-r-5"></i>Organizations</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                  <p>
                                      {{ $faculty->organizations }}
                                  </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif
                </div>
            </div> <!-- row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
