@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/recommend.css') !!}">

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <h3></h3>
        </section>
        <section class="content jobpost-content">
            <div class="row ">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box box-primary color-palette-box">
                        <div class="box-header">
                          <h2 class="sidelines-box-header"><span class="fa  fa-check-square-o"></span> Recommendation of {{ current(explode(' ',$student->fname)) . ' ' . $student->lname }}</h2>
                        </div><!-- /.box-header -->
                      <div class="box-body">


                            <div class="jobpost-label">
                                <br/>
                            {!! Form::model($student->pivot, array('method' => 'put',
                                'route' => ['recommendations.update',  $student->id])) !!}

                                {!! Form::textarea('recommendation_details', null , ['class' => 'form-control jobcreate-desc','required']) !!}

                            </div>

                            <div class="jobpost-label"><center>
                                {!! Form::hidden('recommendation_id', $student->pivot->id) !!}
                                {!! Form::submit(' Save Changes ',['class'=>'btn btn-primary'])!!}
                                <a href="{{ URL::to('recommendations/students') }}" class="btn btn-danger btn-cancel" > Cancel </a>
                            </div></center><br/>
                            {!! Form::close() !!}
                       </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!--col-->
            </div><!--row-->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
