@extends('auth.masterlogin')
@section('title', 'Register')

@section('content')

<section class="content">
    <div class="pregister-logo">
      <a href="login"> <img src="/dist/img/sidelogo.png" class="preg-logo img-responsive"/></a>
    </div><!-- login-logo -->
    <div class="row" style="margin-top: -30px;">
        <div class="col-md-3">
            <div class="pregister-box">
                <div class="pregister-body">
                    <div class="pregister-logo">

                        <img src="/dist/img/student.png" class="img-responsive pregister-img"/>

                    </div><!-- Close Image -->

                    <div class="form-group has-feedback pre-title">

                        <font class="pregister-font"><h2>As Student</h2></font>

                    </div>
                    <!-- Div for title Closed -->

                    <div class="form-group has-feedback">

                        <ul class="pregister-ul">
                            <li>Earn for your tuition fee or allowance</li>
                            <li>Become industry-ready</li>
                            <li>Future employment opportunities</li>
                        </ul>

                    </div>
                    <!-- Div for description Closed -->

                    <div class="row">
                        <div class="pregister-button btn-studschool" >
                            {!! Form::open(array('url' => 'preregister', 'class' => 'form')) !!}

                                {!! Form::hidden('user_type', 's') !!}
                                <button class="btn btn-primary btn-block btn-flat pregister-btn"><i class="fa fa-pencil-square-o" style="font-size: 14px;"></i> Sign up </button>

                            {!! Form::close() !!}
                        </div><!-- /.col -->
                    </div><!-- Close Row -->
                </div><!-- /.Pregister-box-body -->
            </div><!-- /.Pregister-box -->
        </div><!-- Close Col -->

        <div class="col-md-3">
            <div class="pregister-box">
                <div class="pregister-body">
                    <div class="pregister-logo">

                        <img src="/dist/img/company.png" class="img-responsive pregister-img"/>

                    </div><!-- Close Image -->

                    <div class="form-group has-feedback pre-title">

                        <font class="pregister-font"><h2>As Company</h2></font>

                    </div>
                    <!-- Div for title Closed -->

                    <div class="form-group has-feedback">

                        <ul class="pregister-ul">
                            <li>Fast, efficient, reliable and recruitment</li>
                            <li>Save on labor costs</li>
                            <li>Stronger workforce</li>
                            <li>Help deserving college students secure a bright future</li>
                        </ul>

                    </div>
                    <!-- Div for description Closed -->

                    <div class="row">
                        <div class="pregister-button">
                            {!! Form::open(array('url' => 'preregister', 'class' => 'form')) !!}

                                {!!  Form::hidden('user_type', 'c') !!}
                                <button class="btn btn-primary btn-block btn-flat pregister-btn"><i class="fa fa-pencil-square-o" style="font-size: 14px;"></i> Sign up </button>

                            {!! Form::close() !!}
                        </div><!-- /.col -->
                    </div><!-- Close Row -->
                </div><!-- /.Pregister-box-body -->
            </div><!-- /.Pregister-box -->
        </div><!-- Close Col -->

        <div class="col-md-3">
            <div class="pregister-box">
                <div class="pregister-body">
                    <div class="pregister-logo">

                        <img src="/dist/img/school.png" class="img-responsive pregister-img"/>

                    </div><!-- Close Image -->

                    <div class="form-group has-feedback pre-title">

                        <font class="pregister-font"><h2>As School Admin</h2></font>

                    </div>
                    <!-- Div for title Closed -->

                    <div class="form-group has-feedback">

                        <ul class="pregister-ul">
                            <li>Increase enrollment</li>
                            <li>Decrease college dropouts</li>
                            <li>Democratize quality education</li>
                        </ul>

                    </div>
                    <!-- Div for description Closed -->

                    <div class="row">
                        <div class="pregister-button btn-studschool">
                            {!! Form::open(array('url' => 'preregister', 'class' => 'form')) !!}

                                {!! Form::hidden('user_type', 'sa') !!}
                                <button class="btn btn-primary btn-block btn-flat pregister-btn"><i class="fa fa-pencil-square-o" style="font-size: 14px;"></i> Sign up </button>

                            {!! Form::close() !!}
                        </div><!-- /.col -->
                    </div><!-- Close Row -->
                </div><!-- /.Pregister-box-body -->
            </div><!-- /.Pregister-box -->
        </div><!--Close Col-->

        <div class="col-md-3">
            <div class="pregister-box" >
                <div class="pregister-body">
                    <div class="pregister-logo">

                        <img src="/dist/img/teacher.png" class="img-responsive pregister-img"/>

                    </div><!-- Close Image -->

                    <div class="form-group has-feedback pre-title">

                        <font class="pregister-font"><h2>As Dean/Faculty</h2></font>

                    </div>
                     <!-- Div for Title Closed -->

                    <div class="form-group has-feedback">

                        <ul class="pregister-ul">
                            <li>Help your students build a better future</li>
                            <li>Earn via recommendations</li>
                            <li>Build your reputation</li>
                        </ul>

                    </div>
                        <!-- Div for description Closed -->

                    <div class="row">
                        <div class="pregister-button btn-df">
                            {!! Form::open(array('url' => 'preregister', 'class' => 'form')) !!}

                                {!! Form::hidden('user_type', 'df') !!}
                                <button class="btn btn-primary btn-block btn-flat pregister-btn"><i class="fa fa-pencil-square-o" style="font-size: 14px;"></i> Sign up </button>

                            {!! Form::close() !!}
                        </div><!-- /.col -->
                    </div><!-- Close Row -->
                </div><!-- /.Pregister-box-body -->
            </div><!-- /.Pregister-box -->
        </div><!--Close Col-->
    </div><!--Close Row-->
</section><!--Close Section-->


@endsection
