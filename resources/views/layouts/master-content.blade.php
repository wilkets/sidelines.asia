@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" wrapper-content ">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                  <h2 class="sidelines-box-header"><span class="fa fa-newspaper-o"></span> Jobs Posts</h2>
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 270px; overflow: hidden;">Job Title</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Benefits</th>
                            <th style="width: 85px;">Date Posted</th>
                            <th style="width: 85px;">Deadline</th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach($jobs as $job)
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
                                <td> {{ $job->company->address }} </td>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection
