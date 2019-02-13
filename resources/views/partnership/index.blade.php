@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper wrapper-list">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-users"></span>Partners</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px"></th>
                            <th> School Partnered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partners as $partner)
                            <tr>
                                <td>
                                    <div class="user-block">
                                        @if(!empty($partner->user->image))
                                            <img src="{{ asset('img/profilepics/' . $partner->user->image) }}" class="img-circle" alt="User Image">
                                        @else
                                            <img src="{{ asset('dist/img/avatar-default-school.png') }}" class="img-circle" alt="User Image">
                                        @endif
                                    </div><!-- /.user-block -->
                                </td>
                                <td>
                                    <a href="{{ URL::to('/', $partner->user->id)}}">
                                        {{ $partner->name }}
                                    </a>
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
