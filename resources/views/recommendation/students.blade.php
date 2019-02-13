@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/recommend.css') !!}">

    <div class=" wrapper-content">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-list"></span> Students</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px"></th>
                            <th>Name</th>
                            <th>Course</th>
                            <th style="width: 80px;" >Year Level</th>
                            <th style="width: 150px;"></th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>
                                    <div class="user-block">
                                        @if($student->user != null)
                                            @if(!empty($student->user->image))
                                                <img src="{{ asset('img/profilepics/' . $student->user->image) }}" class="img-circle" alt="User Image">
                                            @else
                                                <img src="{{ asset('dist/img/avatar-default.png') }}" class="img-circle" alt="User Image">
                                            @endif
                                        @endif
                                    </div><!-- /.user-block -->
                                </td>
                                <td><a href="{{ URL::to('/', $student->user->id) }}"> {{ $student->fname . ' ' . $student->lname }} </a></td>
                                <td>
                                    @if(!empty($student->degree->name))
                                        {{ $student->degree->name }}
                                    @else
                                        None
                                    @endif
                                </td>
                                <td align="center">
                                    @if(!empty($student->yr_lvl != 0))
                                        {{ $student->yr_lvl}}
                                    @else
                                        None
                                    @endif
                                </td>
                            {!! Form::open(array('url' => 'recommendations/students', 'class' => 'form')) !!}
                                {!! Form::hidden('student_id', $student->id) !!}
                                <td align="center">
                                    @if(Auth::user()->userable->recommendations->contains($student->id))
                                        <label class="recom-done"><i class="fa fa-check"></i> Recommended</label>
                                    @else

                                        {!! Form::submit('   Recommend   ',['class'=>'btn btn-primary', 'style'=>'font-size: 14px; padding-top: 2px; padding-bottom:2px;'])!!}

                                    @endif
                                </td>
                            {!! Form::close()!!}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
