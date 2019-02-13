@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" wrapper-content">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-user-plus"></span> Applications</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Job Title</th>
                            <th>Student Name</th>
                            <th>Benefits</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td> {{ $application->company_name }} </a></td>
                                <td><a href="{{ URL::route('jobs.show', $application->job_id) }}"> {{ $application->name }} </a></td>
                                <td><a href="{{ URL::to('/' . $application->id) }}"> {{ $application->fname . ' ' . $application->lname }} </a></td>
                                <td>
                                    @if($application->major_benefit == '0')
                                            Sponsorship for Tuition Fee
                                    @elseif($application->major_benefit == '1')
                                            Allowance
                                    @elseif($application->major_benefit == '2')
                                            Sponsorship for Tuition Fees + Allowance
                                    @endif
                                </td>
                                <td>
                                    <center>
                                        <a href="{{ URL::route('jobs.show', $application->job_id) }}"><button type="button" class="btn btn-default" title="View"><i class="glyphicon glyphicon-eye-open"></i></button></a>
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
