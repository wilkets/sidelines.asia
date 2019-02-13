@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->

@if($user_type == 's')

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
                                    @if(!empty($student->user->image))
                                        <img src="{{ asset('img/profilepics/' . $student->user->image) }}" class="img-responsive thumbnail" alt="User profile picture">
                                    @else
                                        <img src="{{ asset('dist/img/avatar-default.png') }}" class="img-responsive thumbnail" alt="User profile picture">
                                    @endif
                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    @if(Auth::check())
                                        @if(Auth::user()->id === $student->user->id)
                                            <a href="{{ URL::to('/' . $student->user->id) . '/edit' }}"><i class="fa fa-edit pull-right">Edit</i></a>
                                        @endif
                                    @endif
                                    <h3 class="profile-username"> {{ $student->fname . " " .  $student->lname }} </h3>

                                    <strong>School</strong>
                                    <p class="text-muted">
                                      {{ $student->school->name }}
                                    </p>

                                    @if(!empty($student->degree->name) && $student->degree->name != null)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Course</strong>
                                                <p class="text-muted">
                                                  {{ $student->degree->name }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Year Level</strong>
                                                <p class="text-muted">
                                                  {{ $student->yr_lvl }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Email</strong>
                                            <p class="text-muted">
                                                {{ $student->user->email }}
                                            </p>
                                        </div>
                                        @if(!empty($student->contact_no))
                                            <div class="col-md-6">
                                                <strong>Contact Number</strong>
                                                <p class="text-muted">
                                                    {{ $student->contact_no }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>

                                    <strong>Birthdate</strong>
                                    <p class="text-muted">
                                      {{ date("F d, Y", strtotime($student->date_of_birth)) }}
                                    </p>
                                </div>
                            </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    @if(count($student->skills) > 0 || $student->about_me != null && !empty($student->about_me))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"><i class="fa fa-user-plus margin-r-5"></i>About Me</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <p style="text-align:justify;">
                                    {!! nl2br(e($student->about_me)) !!}
                                </p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                                <p>
                                    @foreach($student->skills as $skill)
                                        <a href="students/skills/{{ $skill->name }}"><span class="label label-danger">{{ $skill->name }}</span> </a>
                                    @endforeach
                                </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                    @if(!empty($student->education))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><i class="fa   fa-graduation-cap margin-r-5"></i>  Education</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <p>
                                    {!! nl2br(e($student->education)) !!}
                                </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                    @if(!empty($student->achievements))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><i class="fa fa-star margin-r-5"></i>Achievements</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                  <p>
                                      {!! nl2br(e($student->achievements)) !!}
                                  </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                    @if(!empty($student->seminars))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><i class="fa fa-book margin-r-5"></i>Seminars</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                  <p>
                                      {!! nl2br(e($student->seminars)) !!}
                                  </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                    @if(!empty($student->organizations))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><i class="fa  fa-users margin-r-5"></i>Organizations</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                  <p>
                                      {!! nl2br(e($student->organizations)) !!}
                                  </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif
                </div>

                <div class="col-md-4">

                    <div class="box box-info">
                        <div class="box-header with-border">
                          <font class="box-title text-muted recom-h"><i class="fa fa-thumbs-o-up"></i> Recommendations</font>
                        </div><!-- /.box-header -->

                          <div class="table-responsive">
                            <table class="table no-margin">
                                @foreach($student->recommendations as $id => $faculty)
                                <tr>
                                  <td valign="middle"><a href="{{ URL::to('/', $faculty->user->id) }}">{{ current(explode(' ', $faculty->fname)) . ' ' .  $faculty->lname}}</a></td>
                                  <!-- <td align="right"> <a href="{{ URL::route('recommendations.show', $faculty->pivot->id) }}" class="btn btn-primary btn-view">View Details</a></td> -->
                                  <td align="right"><button type="button" class="btn-infos btn btn-primary btn-view" data-toggle="modal" data-target="#model-{{ $id }}" >View Details</button></td>

                                    <div class="modal fade" id="model-{{ $id }}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" tabindex="">
                                        <div class="modal-dialog box box-info" >
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                  <a type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></a>
                                                  <h3 class="modal-h"><center>Recommendation Details</center></h3>

                                              </div>
                                              <div class="modal-body">
                                                    <div class="form-group">
                                                      <div>
                                                          <p class="jobpost-p">{!! nl2br(e($faculty->pivot->recommendation_details)) !!}</p>
                                                      </div>
                                                    </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div> <!-- modal close-->
                                </tr>
                                @endforeach

                            </table>

                          </div><!-- /.table-responsive -->
                    </div>  <!-- box -->
                </div>  <!-- col-md-4 -->

            </div> <!-- row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@elseif($user_type == 'c')

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
                                        <img src="{{ asset('img/profilepics/' . $company->user->image) }}" class="img-responsive thumbnail" alt="User Image">
                                    @else
                                        <img src="{{ asset('dist/img/avatar-default-company.png') }}" class="img-responsive thumbnail" alt="User Image">
                                    @endif
                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
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

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Email</strong>
                                            <p class="text-muted">
                                                {{ $company->user->email }}
                                            </p>
                                        </div>
                                        @if(!empty($company->tel_no))
                                        <div class="col-md-6">
                                            <strong>Contact Number</strong>
                                            <p class="text-muted">
                                                {{ $company->tel_no }}
                                            </p>
                                        </div>
                                        @endif
                                    </div>

                                    @if(!empty($company->website))
                                        <strong>Company Website</strong>
                                        <p class="text-muted" style="overflow:hidden;">
                                            <a href="{{ $company->website }}">{{ $company->website }}</a>
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
                                <p style="text-align:justify;">
                                    {!! nl2br(e($company->description)) !!}
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


@elseif($user_type == 'd' || $user_type == 'f')


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
                                    @if(!empty($faculty->user->image))
                                        <img src="{{ asset('img/profilepics/' . $faculty->user->image) }}" class="img-responsive thumbnail" alt="User profile picture">
                                    @else
                                        <img src="{{ asset('dist/img/avatar-default.png') }}" class="img-responsive thumbnail" alt="User profile picture">
                                    @endif
                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    @if(Auth::check())
                                        @if(Auth::user()->id === $faculty->user->id)
                                            <a href="{{ URL::to('/' . $faculty->user->id) . '/edit' }}"><i class="fa fa-edit pull-right"> Edit </i></a>
                                        @endif
                                    @endif
                                    <h3 class="profile-username"> {{ $faculty->fname . " " .  $faculty->lname }} </h3>

                                    @if($user_type == 'f')
                                        <strong>School Faculty in</strong>
                                    @else
                                        <strong>School Dean  in</strong>
                                    @endif
                                    <p class="text-muted">
                                      {{ $faculty->school->name }}
                                    </p>
                                    <strong>Birthdate</strong>
                                    <p class="text-muted">
                                      {{ date("F d, Y", strtotime($faculty->date_of_birth)) }}
                                    </p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Email</strong>
                                            <p class="text-muted">
                                                {{ $faculty->user->email }}
                                            </p>
                                        </div>
                                        @if(!empty($faculty->contact_no))
                                            <div class="col-md-6">
                                                <strong>Contact Number</strong>
                                                <p class="text-muted">
                                                    {{ $faculty->contact_no }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
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
                                <p style="text-align:justify;">
                                    {!! nl2br(e($faculty->about_me)) !!}
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
                                    {!! nl2br(e($faculty->education)) !!}
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
                                      {!! nl2br(e($faculty->achievements)) !!}
                                  </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                    @if(!empty($faculty->seminars))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><i class="fa fa-book margin-r-5"></i>Seminars</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                  <p>
                                      {!! nl2br(e($faculty->seminars)) !!}
                                  </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif

                    @if(!empty($faculty->organizations))
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title"><i class="fa  fa-users margin-r-5"></i>Organizations</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                  <p>
                                      {!! nl2br(e($faculty->organizations)) !!}
                                  </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endif
                </div>


                <div class="col-md-4">

                    <div class="box box-info">
                        <div class="box-header with-border">
                          <font class="box-title text-muted recom-h"><i class="fa fa-thumbs-o-up"></i> Recommended Students</font>
                        </div><!-- /.box-header -->

                            <div class="table-responsive">
                              <table class="table no-margin">
                                  @foreach($faculty->recommendations as $id => $student)
                                  <tr>
                                    <td valign="middle"><a href="{{ URL::to('/', $student->user->id) }}">{{ current(explode(' ', $student->fname)) . ' ' .  $student->lname}}</a></td>

                                    <td align="right"><button type="button" class="btn-infos btn btn-primary btn-view" data-toggle="modal" data-target="#model-{{ $id }}" >View Details</button></td>

                                      <div class="modal fade" id="model-{{ $id }}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" tabindex="">
                                          <div class="modal-dialog box box-info" >
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <a type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></a>
                                                    <h3 class="modal-h"><center>Recommendation Details</center></h3>
                                                </div>
                                                <div class="modal-body">
                                                      <div class="form-group">
                                                        <div>
                                                            <p class="jobpost-p">{!! nl2br(e($student->pivot->recommendation_details)) !!}</p>
                                                        </div>
                                                      </div>
                                                </div>
                                              </div>
                                          </div>
                                      </div> <!-- modal close-->
                                  </tr>
                                  @endforeach

                              </table>

                            </div><!-- /.table-responsive -->
                    </div>  <!-- box -->
                </div>  <!-- col-md-4 -->

            </div> <!-- row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@elseif($user_type == 'sa')

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
                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    @if(Auth::check())
                                        @if(Auth::user()->id === $school->user->id)
                                            <a href="{{ URL::to('/' . $school->user->id) . '/edit' }}"><i class="fa fa-edit pull-right"> Edit </i></a>
                                        @elseif(Auth::user()->user_type === 'c')
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
                                    @endif
                                    <h3 class="profile-username"> {{ $school->name  }} </h3>

                                    <strong>Address</strong>
                                    <p class="text-muted">
                                        {{ $school->address }}
                                    </p>

                                    @if(!empty($school->website))
                                        <strong>Website</strong>
                                        <p class="text-muted">
                                            <a href="{{ $school->website }}">{{ $school->website }}</a>
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
                                <p style="text-align:justify;">
                                     {!! nl2br(e($school->description)) !!}
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

@endif



@endsection
