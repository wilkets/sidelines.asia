@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" wrapper-content ">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-newspaper-o"></span> Students</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20"></th>
                            <th>Name</th>
                            <th>Date Registered</th>
                            <th>Course</th>
                            <th>Year Level</th>
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
                                <td> {{ date("M d, Y", strtotime($student->created_at)) }}</td>
                                <td>
                                    @if(!empty($student->degree->name) && $student->degree->name != null)
                                        {{ $student->degree->name }}
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
@endsection
