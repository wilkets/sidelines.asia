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
                          <h2 class="sidelines-box-header"><span class="fa  fa-check-square-o"></span> Recommend {{ current(explode(' ',$student->fname)) . ' ' . $student->lname }}</h2>
                        </div><!-- /.box-header -->
                      <div class="box-body">


                            <div class="jobpost-label">
                                <br/>
{!! Form::open(array('route' => 'recommendations.store')) !!}
                                <!-- if -->

                                @if(!empty($student->degree->name) && $student->degree->name != null)

                                {!! Form::textarea('recommendation_letter','

Dear Sir/Madam,

Hello and good day!

I would like to recommend ' .  $student->fname . ' ' . $student->lname . ' to your company.
He is from '. $student->school->name . ' currently taking up ' . $student->degree->name . '.

[Reason why you recommend this student. (e.g. Skills, Achievements or Character)]

Thank you very much.

Sincerely yours,

'  .

Auth::user()->userable->fname . ' ' . Auth::user()->userable->lname

                                 , ['class' => 'form-control jobcreate-desc','required']) !!}

                                @else

                                {!! Form::textarea('recommendation_letter','

Dear Sir/Madam,

Hello and good day!

I would like to recommend ' .  $student->fname . ' ' . $student->lname . ' to your company.

[Reason why you recommend this student. (e.g. Skills, Achievements or Character)]

Thank you very much.

Sincerely yours,

'  .

Auth::user()->userable->fname . ' ' . Auth::user()->userable->lname

                                , ['class' => 'form-control jobcreate-desc','required']) !!}

                                @endif

                                <!-- endif -->

                            </div>

                            <div class="jobpost-label"><center>
                                {!! Form::hidden('student_id', $student->id) !!}
                                {!! Form::submit('Send Recommendation',['class'=>'btn btn-primary'])!!}
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
