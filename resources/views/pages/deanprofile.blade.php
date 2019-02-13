@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <!-- Your Page Content Here -->
                <div class="row">
                    <div class="col-md-8">
                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="img-responsive" src="/dist/img/avatar.png" alt="User profile picture">
                                    </div>
                                    <div class="col-md-8">
                                        <a href="#"><i class="fa fa-edit pull-right"> Edit </i></a>
                                        <h3 class="profile-username"> Dean Gwapo </h3>

                                        <strong>School</strong>
                                        <p class="text-muted">
                                            University of Cebu
                                        </p>

                                        <strong>Country</strong>
                                        <p class="text-muted">
                                            Philippines
                                        </p>

                                        <strong>Website</strong>
                                        <p class="text-muted">
                                            <a href="#">
                                                https://www.accenture.com/ph-en
                                            </a>
                                        </p>
                                    </div>
                                </div> <!-- /.row -->
                            </div> <!-- /.box-body -->
                        </div> <!-- /.box -->

                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title">Working Experience</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <p>
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                                nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                sustainable VHS.
                                </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>

                    <div class="col-md-4">
                        <div class="box box-info">
                          <div class="box-header with-border">
                            <h3 class="box-title"> Ebuen D. Great </h3>
                            <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                              <strong><i class="fa fa-book margin-r-5"></i> Experiences</strong>
                                <p class="text-muted">
                                  B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                                <p>
                                  <span class="label label-danger">UI Design</span>
                                  <span class="label label-success">Coding</span>
                                  <span class="label label-info">Javascript</span>
                                  <span class="label label-warning">PHP</span>
                                  <span class="label label-primary">Node.js</span>
                                </p>
                          </div><!-- /.box-body -->

                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h3 class="box-title"> Wilkets D. Great </h3>
                              <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                              </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Experiences</strong>
                                  <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                  </p>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                                  <p>
                                    <span class="label label-danger">UI Design</span>
                                    <span class="label label-success">Coding</span>
                                    <span class="label label-warning">PHP</span>
                                    <span class="label label-primary">Node.js</span>
                                  </p>
                            </div><!-- /.box-body -->

                      </div> <!-- /.box box-info -->
                  </div>  <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!--- /.container -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
