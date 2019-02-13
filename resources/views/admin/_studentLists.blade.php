@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" content-wrapper content-wrapper-stud ">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-mortar-board"></span> Students</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px"></th>
                            <th>Name </th>
                            <th>School</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th style="width: 200px;">Action</th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach($students as $id => $student)
                            <tr>
                                <td>
                                    <div class="user-block">
                                        @if(!empty($student->user->image))
                                            <img src="{{ asset('img/profilepics/' . $student->user->image) }}" class="img-circle" alt="User Image">
                                        @else
                                            <img src="{{ asset('dist/img/avatar-default.png') }}" class="img-circle" alt="User Image">
                                        @endif
                                    </div><!-- /.user-block -->
                                </td>
                                <td> {{ $student->fname . ' ' . $student->lname }} </td>
                                <td> {{ $student->school->name }} </td>
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
                                <td> {{ $student->user->email }} </td>
                                <td align="center">
                                    @if($student->status == 1)
                                        <small class="label bg-green">Active</small>
                                    @elseif($student->status == 0)
                                        <small class="label bg-yellow">Inactive</small>
                                    @endif
                                </td>

                                <td>
                                    <div>
                                        <center>
                                            <a href="{{ URL::to('/', $student->user->id)}}"><button type="button" class="btn btn-default" title="View"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                                            {!! Form::open(array('route' => array('admin.retrieve', $student->user->id), 'class'=>'action-btns')) !!}
                                                <button type="submit" class="btn btn-default" title="Retrieve"><i class="glyphicon glyphicon-cloud-upload"></i></button>
                                            {!! Form::close() !!}
                                            {!! Form::open(array('route' => array('admin.delete', $student->user->id), 'method' => 'delete', 'method' => 'delete','class'=>'action-btns')) !!}
                                                <button type="submit" class="btn btn-default" title="Deactivate"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                            {!! Form::close() !!}
                                                <button type="submit" class="btn btn-default btn-infos" data-toggle="modal" data-target="#model-{{ $id }}" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>

                                                <div class="modal" id="model-{{ $id }}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" tabindex="">
                                                    <div class="modal-dialog box box-danger" >
                                                        <div class="modal-content">
                                                          <div class="modal-header-del">
                                                              <h3 class="modal-del-text"><center>This will permanently delete this student in the database.<br/> Are you sure you want to proceed?</center></h3>
                                                          </div>
                                                          <div class="modal-footer">
                                                                <center>
                                                                    <div class="action-btns2">
                                                                        {!! Form::open(array('route' => array('admin.forcedelete', $student->user->id), 'method' => 'delete')) !!}
                                                                          {!! Form::submit('Yes',['class'=>'btn btn-primary btn-del-yes'])!!}
                                                                        {!! Form::close() !!}
                                                                    </div>
                                                                    <div class="action-btns2">
                                                                        <button type="button" class="btn btn-primary btn-del-no" data-toggle="modal" data-target="#model-{{ $id }}">No</button>
                                                                    </div>
                                                                </center>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- modal close-->
                                        </center>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection
