@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/recommend.css') !!}">

    @if(Auth::user()->user_type == 'd' || Auth::user()->user_type == 'f')

    <div class=" wrapper-content ">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-thumbs-up"></span>Recommended Students</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px"></th>
                            <th>Name</th>
                            <th>Course</th>
                            <th style="width: 80px;" >Year Level</th>
                            <th style="width: 75px;"></th>
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
                                <td>
                                    @if($student->user != null)
                                        <a href="{{ URL::to('/', $student->user->id) }}"> {{ $student->fname . ' ' . $student->lname }} </a>
                                    @else
                                        {{ $student->fname . ' ' . $student->lname }}
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($student->degree->name) && $student->degree->name != null)
                                        {{ $student->degree->name }}
                                    @else
                                        None
                                    @endif
                                </td>
                                <td align="center">
                                    @if($student->yr_lvl != 0)
                                        {{ $student->yr_lvl}}
                                    @else
                                        None
                                    @endif
                                </td>
                                <td align="center">
                                    <a href="{{ URL::route('recommendations.show', $student->pivot->id) }}"> View Details </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @elseif(Auth::user()->user_type == 'c')

    <div class=" wrapper-content ">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-list"></span> Recommended Students</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="8px"> </th>
                            <th style="width: 150px;"></th>
                            <th>Name</th>
                            <th>Course</th>
                            <th style="width: 80px;">Year Level</th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>
                                    <center>
                                        <small class="label bg-green" title="Recommendations"> {{ $student->recommendations }} </small>
                                    </center>
                                </td>
                                <td>
                                    <a href="{{ URL::to('recommendations/student/' . $student->id) }}" style="font-size: 14px;"> View Recommendations </a>
                                </td>
                                <td>
                                    <a href="{{ URL::to('/', $student->user_id) }}"> {{ $student->fname . ' ' . $student->lname }} </a>
                                </td>
                                <td>
                                    @if(!empty($student->degree) && $student->degree != null)
                                        {{ $student->degree }}
                                    @endif
                                </td>
                                <td align="center">
                                    @if($student->yr_lvl != 0)
                                        {{ $student->yr_lvl}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @elseif(Auth::user()->user_type == 's')

    <div class=" wrapper-content ">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-thumbs-up"></span> My Recommendations</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px"></th>
                            <th>Faculty Name</th>
                            <th>Date Recommended</th>
                            <th width="80px"></th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach($faculties as $faculty)
                            <tr>
                                <td>
                                    <div class="user-block">
                                        @if(!empty($faculty->user->image))
                                            <img src="{{ asset('img/profilepics/' . $faculty->user->image) }}" class="img-circle" alt="User Image">
                                        @else
                                            <img src="{{ asset('dist/img/avatar-default.png') }}" class="img-circle" alt="User Image">
                                        @endif
                                    </div><!-- /.user-block -->
                                </td>
                                <td><a href="{{ route('users.show', $faculty->user->id) }}"> {{ $faculty->fname . ' ' . $faculty->lname}} </a></td>
                                <td> {{ date("M d, Y", strtotime($faculty->pivot->created_at)) }} </td>
                                <td align="center"><a href="{{ URL::route('recommendations.show', $faculty->pivot->id) }}">View Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @endif
@endsection
