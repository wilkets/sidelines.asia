@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper-content">
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Jobs Applieds</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Location</th>
                            <th>Company</th>
                            <th>Benefits</th>
                            <th>Date Posted</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                    <tbody>
                        <tr>
                            <td><a href="#"> Accenture </a></td>
                            <td>Cebu City, Cebu <small class="text-muted"> 795 Folsom Ave, Suite 600 <small></td>
                            <td>Admin, Inc.</td>
                            <td> Tuition Fee  Sponsorship + Allowance </td>
                            <td> November 10 </td>
                            <td>
                                <center>
                                    <a href="#"><button type="button" class="btn btn-default" title="View"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                                    <a href="#"><button type="button" class="btn btn-default" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button></a>
                                    <a href="#"><button type="button" class="btn btn-default" title="Delete"><i class="glyphicon glyphicon-trash"></i></button></a>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
