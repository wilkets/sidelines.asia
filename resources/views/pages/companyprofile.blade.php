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
                                        <img class="img-responsive" src="/dist/img/avatar3.png" alt="User profile picture">
                                    </div>
                                    <div class="col-md-8">
                                        <a href="#"><i class="fa fa-edit pull-right"> Edit </i></a>
                                        <h3 class="profile-username"> Accenture </h3>
                                        <div class="invoice-col">

                                              <address>
                                                <strong> Address</strong><br>
                                                795 Folsom Ave, Suite 600<br>
                                                San Francisco, CA 94107<br>
                                                Phone: (804) 123-5432<br>
                                                Email: info@almasaeedstudio.com
                                              </address>
                                        </div><!-- /.col -->

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
                              <h3 class="box-title">About</h3>
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

                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title">Vission</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <p>
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title">Mission</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <p>
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                </p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>

                    <div class="col-md-4">
                        <div class="box box-info">
                          <div class="box-header with-border">
                            <h3 class="box-title"> Details</h3>
                            <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                              <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                  <b>Job Posts</b> <a class="pull-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Applicants</b> <a class="pull-right">543</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Recommendations</b> <a class="pull-right">30</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Partners</b> <a class="pull-right">5</a>
                                </li>
                              </ul>
                          </div> <!-- /.box-body -->
                      </div> <!-- /.box box-info -->

                      <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title"> Transactions </h3>
                          <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                              <table class="table no-margin">
                                <thead>
                                  <tr>
                                    <th>Payment Date</th>
                                    <th>Amount</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-muted"><a href="#">2015-08-13</td>
                                    <td>2,500</td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted"><a href="#">2015-08-13</td>
                                    <td>2,500</td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted"><a href="#">2015-08-13</td>
                                    <td>2,500</td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted"><a href="#">2015-08-13</td>
                                    <td>2,500</td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted"><a href="#">2015-08-13</td>
                                    <td>2,500</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div><!-- /.table-responsive -->
                        </div> <!-- /.box-body -->
                    </div> <!-- /.box box-info -->
                  </div>  <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!--- /.container -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
