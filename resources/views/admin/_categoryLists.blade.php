@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" wrapper-content">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-file-text-o"></span> Job Categories</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Jobs</th>
                            <th width="200px">Action</th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach($categories as $id => $category)
                            <tr>
                                <td> {{ $category->name }} </a></td>
                                <td> {{ count($category->jobs) }}</td>
                                <td>
                                    <center>
                                        <a href="{{ URL::route('categories.edit', $category->id)}}"><button type="button" class="btn btn-default" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button></a>
                                        <button type="submit" class="btn btn-default btn-infos" data-toggle="modal" data-target="#model-{{ $id }}" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>

                                        <div class="modal fade" id="model-{{ $id }}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" tabindex="">
                                            <div class="modal-dialog box box-danger" >
                                                <div class="modal-content">
                                                  <div class="modal-header-del">
                                                      <h3 class="modal-del-text"><center>This will permanently delete this category in the database.<br/> Are you sure you want to proceed?</center></h3>
                                                  </div>
                                                  <div class="modal-footer">
                                                        <center>
                                                            <div class="action-btns2">
                                                                {!! Form::open(array('route' => array('categories.destroy',  $category->id), 'method' => 'delete')) !!}
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
