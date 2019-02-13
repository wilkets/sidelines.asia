@extends('layouts.master')
@section('title', 'Sidelines.ph')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" wrapper-content">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-university"></span> Schools</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px"></th>
                            <th> School Name </th>
                            <th>Address</th>
                            <th style="width:0px;">Email </th>
                            <th>Tel. No. </th>
                            <th style="width:0px;">Website</th>
                            <th> # of Students </th>
                            <th>Status</th>
                            <th style="width:150px;">Action</th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach($schools as $school)
                            <tr>
                                <td>
                                    <div class="user-block">
                                        @if(!empty($school->user->image))
                                            <img src="{{ asset('img/profilepics/' . $school->user->image) }}" class="img-circle" alt="User Image">
                                        @else
                                            <img src="{{ asset('dist/img/avatar-default-school.png') }}" class="img-circle" alt="User Image">
                                        @endif
                                    </div><!-- /.user-block -->
                                </td>
                                <td> {{ $school->name }} </td>
                                <td> {{ $school->address }} </td>
                                <td> {{ $school->user->email }} </td>
                                <td> {{ $school->tel_no }} </td>
                                <td> {{ $school->website }} </td>
                                <td align="center"> {{ count($school->students) }} </td>
                                <td align="center">
                                    @if($school->status == 1)
                                        <small class="label bg-green">Active</small>
                                    @elseif($school->status == 0)
                                        <small class="label bg-yellow">Inactive</small>
                                    @endif
                                </td>
                                <td>
                                    <center>
                                        <a href="{{ URL::to('/', $school->user->id)}}"><button type="button" class="btn btn-default" title="View"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                                        {!! Form::open(array('route' => array('admin.retrieve', $school->user->id), 'class'=>'action-btns')) !!}
                                            <button type="submit" class="btn btn-default" title="Retrieve"><i class="glyphicon glyphicon-cloud-upload"></i></button>
                                        {!! Form::close() !!}
                                        {!! Form::open(array('route' => array('admin.delete', $school->user->id), 'method' => 'delete', 'class'=>'action-btns')) !!}
                                            <button type="submit" class="btn btn-default" title="Deactivate"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                        {!! Form::close() !!}
                                    </center>
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
