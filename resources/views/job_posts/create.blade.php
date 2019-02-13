@extends('layouts.master')
@section('title', 'Sidelines')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/jobview.css') !!}">

<div class="content-wrapper">
    <!-- Main content -->

    <section class="content">
        {!! Form::open(array('route' => 'jobs.store')) !!}
        <div class="row ">
            <div class="col-md-10 col-md-offset-1">
                <div class="box box-primary color-palette-box">
                  <div class="box-header with-border">
                    <div class="box-title"><i class="glyphicon glyphicon-pencil"></i>Post a Job</div>
                  </div>
                  <div class="box-body">
                        <div class="jobpost-label">
                            <b>Job Title:</b>
                            {!!Form::text('name', null, array('class' => 'form-control', 'id' => 'jobTitle','required'))!!}
                        </div>

                        </br>

                        <div class="jobpost-label">
                            <b>Job Description:</b>
                            {!!Form::textarea('description', null, array('class' => 'form-control jobcreate-desc', 'placeholder' => 'Write a description...','required'))!!}
                        </div>

                        <div class="jobpost-label">
                            <b>Job Categories:</b>&nbsp;<span class="error">{!! $errors->first('categories'), '<span class="help-block"></span>' !!}</span>
                                <table style="margin-top:10px;">
                                    @foreach($categories->chunk(3) as $chunked_categories)
                                        <tr>
                                            @foreach($chunked_categories as $category)
                                                <td>
                                                    <span style="margin-left:1em">
                                                        <label class="checkbox-inline">
                                                         {!!Form::checkbox('categories[]', $category->id)!!}
                                                         {{ $category->name }}
                                                         </label>
                                                     </span>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                               </table>
                        </div></br>

                        <div class="jobpost-label">
                            <b>Benefits:</b><br/>
                            <label>
                                <span style="margin-left:1em">
                                     <label class="radio-inline">
                                         {!!Form::radio('major_benefit','0', false, ['class'=>'form-control-gender','required']) !!}
                                         Sponsorship for Tuition Fee
                                    </label>
                                </span>
                            </label>
                             <label>
                                 <span style="margin-left:3em">
                                     <label class="radio-inline">
                                     {!!Form::radio('major_benefit','1', false, ['class'=>'form-control-gender','required']) !!}
                                     Allowance
                                    </label>
                                 </span>
                             </label>
                             <label >
                                 <span style="margin-left:3em">
                                   <label class="radio-inline">
                                      {!!Form::radio('major_benefit','2', false, ['class'=>'form-control-gender','required']) !!}
                                      Sponsorship for Tuition Fees + Allowance
                                    </label>
                                    </span>
                             </label>
                        </div></br>

                        <div class="jobpost-label">
                            <b>Other Benefits:</b>
                            {!!Form::textarea('other_benefits', null, array('class' => 'form-control jobcreate-otherben', 'placeholder' => 'Other benefits...'))!!}
                        </div>

                        <div class="jobpost-label">
                            <b>Deadline of Applications:</b>
                            <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-MM-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" required>
                                {!! Form::text('deadline_of_application', null,
                                               array('required',
                                               'readonly',
                                              'class'=>'form-control select-date date-form',
                                              'placeholder'=>'Select date')) !!}

                               <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                               <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                             <div class="error">{!! $errors->first('deadline_of_application'), '<span class="help-block"></span>' !!}</div>
                        </div><br/><br/>

                        <div class="jobpost-label"><center>
                            {!! Form::submit(' Post Job ',['class'=>'btn btn-primary'])!!}
                            <a href="{{ URL::to('/'.'jobs/')}}" class="btn btn-danger btn-cancel" > Cancel </a>
                        </div></center><br/>
                   </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--col-->
        </div><!--row-->
        {!! Form::close() !!}
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->




@endsection
