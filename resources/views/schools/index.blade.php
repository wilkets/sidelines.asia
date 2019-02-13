@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" wrapper-content ">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-university"></span>Schools</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px"></th>
                            <th>School Name</th>
                            <th>Address</th>
                            <th style="width: 135px;">Contact</th>
                            @if(Auth::user()->user_type == 'c')
                                <th width="100px"> </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schools as $id => $school)
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
                                <td><a href="{{ URL::route('schools.show', $school->id) }}"> {{ $school->name }} </a></td>
                                <td> {{ $school->address }} </td>
                                <td> {{ $school->tel_no }} </td>
                                @if(Auth::user()->user_type == 'c')
                                <td>
                                    <center>
                                        @if(Auth::user()->userable->partners->contains($school->id))
                                            @if($school->partners->find(Auth::user()->userable->id)->pivot->status == '1')
                                                <label class="text-green"> Partnered </label>
                                            @elseif($school->partners->find(Auth::user()->userable->id)->pivot->status == '2')
                                                <label class="text-yellow"> Pending... </label>
                                            @elseif($school->partners->find(Auth::user()->userable->id)->pivot->status == '3')
                                                {!! Form::open(array('route' => 'companies.accept')) !!}

                                                    {!! Form::hidden('school_id', $school->id) !!}
                                                    {!! Form::submit('Confirm',['class'=>'btn btn-primary'])!!}

                                                {!! Form::close() !!}
                                            @endif
                                        @else
                                            <button type="submit" class="btn btn-danger btn-cancel" data-toggle="modal" data-target="#model-{{ $id }}" title="Partner"> Partner </button>


                                            <div class="modal" id="model-{{ $id }}" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" tabindex="">
                                                <div class="modal-dialog box box-danger" >
                                                    <div class="modal-content">
                                                      <div class="modal-header-del">
                                                          <h3 class="modal-del-text"><center> Are you sure you want to partner <br />{{ $school->name }}? </center></h3>
                                                      </div>
                                                      <div class="modal-footer">
                                                            <center>
                                                                <div class="action-btns2">
                                                                    {!! Form::open(array('route' => 'companies.partner')) !!}

                                                                        {!! Form::hidden('school_id', $school->id) !!}
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
                                        @endif
                                    </center>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
