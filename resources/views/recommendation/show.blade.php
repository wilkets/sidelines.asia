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

                                <p class="jobpost-p">{!! nl2br(e($student->pivot->recommendation_details)) !!}</p>

                            </div>
                            @if(Auth::user()->user_type === 'd' || Auth::user()->user_type === 'f')
                                @if(Auth::user()->userable->id === $student->pivot->dean_faculty_id)
                                    <div class="jobpost-label"><center>
                                        <a href="{{ URL::route('recommendations.edit',$student->id) }}" class="btn btn-primary" > Edit Details </a>
                                        <a href="{{ URL::route('recommendations.index') }}" class="btn btn-danger btn-cancel" > Cancel </a>
                                    </div></center><br/>
                                @endif
                            @elseif(Auth::user()->user_type === 'c')
                            <div class="jobpost-label"><center>
                                <a href="{{ URL::to('/',$student->user->id) }}" class="btn btn-primary" >    View {{ current(explode(' ',$student->fname)) . '\'s' }} Profile   </a>
                            </div></center><br/>
                            @endif
                       </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!--col-->
            </div><!--row-->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
