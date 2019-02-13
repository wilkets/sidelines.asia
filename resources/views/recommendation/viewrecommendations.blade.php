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
                  <h2 class="sidelines-box-header"><span class="fa fa-list"></span>Recommendations of {{ $student->fname . ' ' . $student->lname }}</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px"></th>
                            <th>Faculty Name</th>
                            <th style="width: 75px;"></th>
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
                                <td><a href="{{ URL::to('/', $faculty->user->id) }}">
                                    {{ $faculty->fname . ' ' . $faculty->lname }}
                                </td>
                                <td align="center">
                                    <a href="{{ URL::route('recommendations.show', $faculty->pivot->id) }}"> View Details</a>
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
