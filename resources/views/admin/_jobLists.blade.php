@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" wrapper-content">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-newspaper-o"></span> Active Job Posts</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 270px; overflow: hidden;">Job Title</th>
                            <th>Company</th>
                            <th>Benefits</th>
                            <th style="width: 86px;">Date Posted</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th style="width:150px;">Action</th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach($jobs as $id => $job)
                            <tr>
                                <td>
                                    <a href="{{ URL::to('/jobs/' . $job->id ) }}" style="overflow: hidden;">
                                        @if(strlen($job->name) > 32)
                                            {{ substr($job->name, 0, 32) . '...'}}
                                        @else
                                            {{ $job->name }}
                                        @endif
                                    </a>
                                </td>
                                <td><a href="{{ URL::route('companies.show', $job->company->id) }}"> {{ $job->company->name }} </a></td>
                                <td>
                                    @if($job->major_benefit == '0')
                                            Sponsorship for Tuition Fee
                                        @elseif($job->major_benefit == '1')
                                            Allowance
                                        @else($job->major_benefit == '2')
                                            Sponsorship for Tuition Fees + Allowance
                                    @endif
                                </td>
                                <td> {{ date("M d, Y", strtotime($job->created_at)) }}</td>
                                <td> {{ date("M d, Y", strtotime($job->deadline_of_application)) }} </td>
                                <td align="center">
                                    @if($job->deleted_at == null)
                                        <small class="label bg-green">Active</small>
                                    @else
                                        <small class="label bg-yellow">Expired</small>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <center>
                                            <a href="{{ URL::route('jobs.show', $job->id ) }}" class="btn btn-default" title="View"><i class="glyphicon glyphicon-eye-open"></i></a>
                                            {!! Form::open(array('route' => array('jobs.retrieve', $job->id), 'class'=>'action-btns')) !!}
                                                <button type="submit" class="btn btn-default" title="Retrieve"><i class="glyphicon glyphicon-cloud-upload"></i></button>
                                            {!! Form::close() !!}
                                            {!! Form::open(array('route' => array('jobs.delete', $job->id), 'method' => 'delete', 'method' => 'delete','class'=>'action-btns')) !!}
                                                <button type="submit" class="btn btn-default" title="Deactivate"><i class="glyphicon glyphicon-minus-sign"></i></button>
                                            {!! Form::close() !!}
                                            <button type="submit" class="btn btn-default btn-infos" data-toggle="modal" data-target="#model-{{ $id }}" title="Delete"><i class="glyphicon glyphicon-trash"></i></button>

                                            <div class="modal fade" id="model-{{ $id }}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" tabindex="">
                                                <div class="modal-dialog box box-danger" >
                                                    <div class="modal-content">
                                                      <div class="modal-header-del">
                                                          <h3 class="modal-del-text"><center>This will permanently delete this job in the database.<br/> Are you sure you want to proceed?</center></h3>
                                                      </div>
                                                      <div class="modal-footer">
                                                            <center>
                                                                <div class="action-btns2">
                                                                    {!! Form::open(array('route' => array('jobs.forcedelete',  $job->id), 'method' => 'delete')) !!}
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
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
