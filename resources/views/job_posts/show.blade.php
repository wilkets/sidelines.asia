@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
  <!-- Content Wrapper. Contains page content -->

  <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/jobview.css') !!}">


  <script type="text/javascript">
      $(function(){
          $("#btn-cancel").click(function(e){
              e.preventDefault();
              $("#dialog-box").modal('fade');
          });
      });

      $(function(){
          $("#btn-cancel").click(function(e){
              e.preventDefault();
              $("#delete-box").modal('fade');
          });
      });
  </script>

<div class="content-wrapper ">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">              

                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
                        {{ Session::get('flash_message') }}
                    </div>
                @endif

                <div class="box box-primary color-palette-box">
                  <div class="box-header with-border">
                    <div class="box-title"><i class="glyphicon glyphicon-pushpin"></i> {{ $job->name }}</div>
                    @if(Auth::check())
                        @if(Auth::user()->id === $job->company->user->id || Input::old('user_type') === 'c' )
                            <div class="pull-right hidden-xs"><a href="#" title="Delete Post" class="job-delete" type="button" data-toggle="modal" data-target="#delete-box"><i class="glyphicon glyphicon-trash" style="top: 6px;"></i></a></div>
                        @endif
                    @endif
                  </div>
                  <div class="box-body">
                    <div class="jobpost-label ">
                        Accepting applications until {{ date("F d, Y", strtotime($job->deadline_of_application)) }} <br/><br/>
                    </div>
                    <div class="jobpost-label">
                        <b>Company Name:</b>
                        <a href="{{ URL::to('/' . $job->company->user->id) }}"> {{ $job->company->name }}</a>
                    </div>

                    </br>

                    <div class="jobpost-label">
                        <b>Company Address:</b>
                        {{ $job->company->address }}
                    </div>

                    </br>

                    <div class="jobpost-label">
                        <b>Job Description:</b>
                            <p class="jobpost-p tab-pane active">
                                {!! nl2br(e($job->description)) !!}
                            </p>
                    </div>

                    <div class="jobpost-label ">
                        <b>Job Categories:</b>
                                @if(count($job->categories) < 2)
                                    @foreach($job->categories as $category)
                                         {{ $category->name }}
                                    @endforeach
                                @else
                                       {{ implode(', ', array_map(function($a){return $a['name'];}, $job->categories->toArray())) }}
                                @endif
                    </div></br>

                    <div class="jobpost-label">
                        <b>Benefits:</b>
                        @if($job->major_benefit == '0')
                            Sponsorship for Tuition Fee
                        @elseif($job->major_benefit == '1')
                            Allowance
                        @else($job->major_benefit == '2')
                             Sponsorship for Tuition Fees + Allowance
                        @endif

                    </div></br>

                    @if(!empty($job->other_benefits))
                      <div class="jobpost-label ">
                          <b>Other Benefits:</b>
                              <p class="jobpost-p tab-pane active">
                                  {!! nl2br(e($job->other_benefits)) !!}
                              </p>
                      </div></br><br/>
                    @endif

                    <center>
                        @if(Auth::check())
                            @if(Auth::user()->user_type === 's' || Input::old('user_type') === 's')
                                @if(!$job->applicants->contains(Auth::user()->userable))
                                    <div class="jobpost-label">
                                      {!! Form::open(array('route' => 'jobs.apply', 'class' => 'form')) !!}
                                        {!! Form::hidden('job_id', $job->id) !!}
                                        {!! Form::submit('Apply for this Job', ['class'=>'btn btn-primary'])!!}
                                      {!! Form::close() !!}
                                    </div>
                                @else
                                    <div class="jobpost-label">
                                      {!! Form::open(array('route' => 'jobs.cancel', 'class' => 'form')) !!}
                                        {!! Form::hidden('job_id', $job->id) !!}
                                        {!! Form::submit('Cancel Application', ['class'=>'btn btn-danger btn-cancel','style'=>'width: 20%;'])!!}
                                      {!! Form::close() !!}
                                    </div>
                                @endif
                          @elseif(Auth::user()->id === $job->company->user->id || Input::old('user_type') === 'c' )
                            <div class="jobpost-label">
                                <a href="{{ URL::to('/'.'jobs/' . $job->id) . '/edit' }}" class="btn btn-primary" > Edit Post </a>

                                    <div class="modal fade" id="delete-box" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-body" style="margin-bottom: -25px;">
                                                  {!! Form::open()!!}
                                                  <h3>Are you sure you want to delete <br/>this job post?</h3>
                                              </div>
                                              <div class="modal-footer">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                              {!! Form::open(array('route' => ['jobs.destroy', $job->id], 'method' => 'delete', 'class' => 'form')) !!}
                                                                {!! Form::submit('Yes', ['class'=>'btn btn-primary btn-del-yes'])!!}
                                                              {!! Form::close() !!}
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="button" class="btn btn-primary btn-del-no" data-toggle="modal" data-target="#delete-box" id="btn-cancel">No</button>
                                                        </div>
                                                    </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              @elseif(Auth::user()->user_type === 'd' || Input::old('user_type') === 'd' ||
                                Auth::user()->user_type === 'f' || Input::old('user_type') === 'f')
                                  <div class="jobpost-label">
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialog-box">Recommend a Student</button>

                                      <div class="modal fade" id="dialog-box" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header" >
                                                    {!! Form::open()!!}
                                                    <h2 style="margin-top: -3px;">Recommend a Student</h2>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Choose a Student that fits for the Job</p>
                                                      <div class="form-group">
                                                        <div>
                                                          <select class="form-control" required>
                                                              <option value="" style="color: #999;">Select Student</option>
                                                              <option>Treb Quiape</option>
                                                              <option>Wil Gwapo</option>
                                                              <option>Bob Student</option>
                                                              <option>Arth Student</option>
                                                              <option>Sample Student</option>
                                                          </select><br/>
                                                        </div>
                                                        <div>
                                                            {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Recommendation Message','required']) !!}
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="modal-footer">
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              {!! Form::submit('Recommend',['class'=>'jobview-control btn-primary recom-btn'])!!}
                                                              {!! Form::close()!!}
                                                          </div>
                                                          <div class="col-md-6">
                                                              <button type="button" class="form-control recom-btn-cancel" data-toggle="modal" data-target="#dialog-box" id="btn-cancel">Cancel</button>
                                                          </div>
                                                      </div>
                                                </div>
                                              </div>
                                          </div>
                                      </div> <!--Modal close-->
                                  </div> <!-- end jpost-label -->
                              @endif <!--Check user type-->
                          @else
                            <div class="jobpost-label">
                              {!! Form::open(array('url' => 'preregister', 'class' => 'form')) !!}

                                  {!! Form::hidden('user_type', 's') !!}

                                  <button class="btn btn-primary"> Apply for this! </button>

                              {!! Form::close() !!}
                            </div>
                          @endif <!--End Auth Check-->
                      </center><br/>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--col-->
        </div><!--row-->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->




@endsection
