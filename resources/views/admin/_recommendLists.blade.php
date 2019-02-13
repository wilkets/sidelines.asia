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
              <h2 class="sidelines-box-header"><span class="fa fa-thumbs-up"></span> Recommendations</h2>
            </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Faculty Name</th>
                        <th>Course</th>
                        <th>Yr Level</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td> {{ $student->student_fname . ' ' . $student->student_lname }} </a></td>
                            <td> {{ $student->faculty_fname . ' ' . $student->faculty_lname }} </a></td>
                            <td> {{ $student->degree_name }} </td>
                            <td align="center">
                                @if($student->yr_lvl != 0)
                                    {{ $student->yr_lvl}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ URL::route('recommendations.show', $student->recommendation_id) }}"> View Details </a>
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
