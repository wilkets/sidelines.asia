@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Skill Tagging
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <!-- Profile Image -->
                    @foreach($students as $student)
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <div class="row">
                                    <div class="col-md-2">
                                        @if(!empty($student->user->image) || $student->user->image != null)
                                            <img src="{{ asset('img/profilepics/' . $student->user->image) }}" class="img-responsive thumbnail" alt="User profile picture">
                                        @else
                                            <img src="{{ asset('dist/img/avatar-default.png') }}" class="img-responsive thumbnail" alt="User profile picture">
                                        @endif
                                    </div>
                                    <div class="col-md-10">

                                        <h3 class="profile-username"><a href="{{ asset($student->user->id) }}">{{ $student->fname . " " . $student->lname }}</a></h3>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>School</strong>
                                                <p class="text-muted">
                                                    {{ $student->school->name }}
                                                </p>
                                            </div>
                                            @if(!empty($student->yr_lvl) && !empty($student->degree->name))
                                                <div class="col-md-3">
                                                    <strong>Year &amp; Course</strong>
                                                    <p class="text-muted">
                                                        {{ $student->yr_lvl }} - {{ $student->degree->name }}
                                                    </p>
                                                </div>
                                            @endif
                                            @if(!empty($student->user->email))
                                                <div class="col-md-3">
                                                    <strong>Email</strong>
                                                    <p class="text-muted">
                                                        {{ $student->user->email }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>

                                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                                          <p>
                                              @foreach($student->skills as $skill)
                                                <a href="{{ $skill->name }}"><span class="label label-danger">{{ $skill->name }}</span> </a>
                                              @endforeach
                                          </p>
                                          <p>

                                          </p>
                                    </div> <!-- col md -->
                                </div> <!-- row -->
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    @endforeach
                </div> <!-- col-md-9 -->
            </div> <!-- row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
