@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class=" wrapper-content">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    @if(Auth::user()->user_type === 's')
                        <h2 class="sidelines-box-header"><span class="fa fa-newspaper-o"></span>  Jobs Applied </h2>
                    @else
                        <h2 class="sidelines-box-header"><span class="fa fa-newspaper-o"></span>  Applications </h2>
                    @endif
                </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Company</th>
                            @if(Auth::user()->user_type === 's')
                                <th>Address</th>
                            @else
                                <th>Applicant</th>
                            @endif
                            <th>Benefits</th>
                            <th>Date Posted</th>
                            <th>Date Applied</th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach($applications as $application)
                            @if(Auth::user()->user_type === 's')
                                <tr>
                                    <td><a href="{{ URL::route('jobs.show', $application->id) }}"> {{ $application->name }} </a></td>
                                    <td><a href="{{ URL::route('companies.show', $application->company->id) }}"> {{ $application->company->name }} </a></td>
                                    <td> {{ $application->company->address }} </td>
                                    <td>
                                        @if($application->major_benefit == '0')
                                                Sponsorship for Tuition Fee
                                        @elseif($application->major_benefit == '1')
                                                Allowance
                                        @elseif($application->major_benefit == '2')
                                                Sponsorship for Tuition Fees + Allowance
                                        @endif
                                    </td>
                                    <td> {{ date("F d, Y", strtotime($application->created_at)) }}</td>
                                    <td> {{ date("F d, Y", strtotime($application->pivot->created_at)) }} </td>
                                </tr>
                            @else
                                <tr>
                                    <td><a href="{{ URL::route('jobs.show', $application->job_id) }}"> {{ $application->name }} </a></td>
                                    <td><a href="{{ URL::route('companies.show', $application->company_id) }}"> {{ $application->company_name }} </a></td>
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
                                    <td> {{ date("F d, Y", strtotime($application->job_posted)) }}</td>
                                    <td> {{ date("F d, Y", strtotime($application->created_at)) }} </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
