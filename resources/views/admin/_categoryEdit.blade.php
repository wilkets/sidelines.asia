@extends('layouts.master')
@section('title', 'Sidelines.ph')

@section('content')

    <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/editprofile.css') !!}">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box box-primary">
                        <div class="box-header">
                          <h2 class="sidelines-box-header"><span class="fa fa-pencil"></span> Edit Category</h2>
                        </div><!-- /.box-header -->
                        <hr/>
                        <div class="box-body">
                            <div class="tab-pane" id="settings">
                                {!! Form::model($category, array('method' => 'put', 'route' => [ 'categories.update', $category->id], 'class' => 'form form-horizontal')) !!}
                                    <div class="form-group">
                                        {!! Form::label('categories', 'Category Name', ['class' => 'col-sm-2 control-label', 'style'=>'margin-top:5px; margin-left:5px;']) !!}
                                        <div class="col-sm-8">
                                            <div class="field_wrapper">
                                                {!! Form::text('name', $category->name, ['class' => 'form-control categ-field', 'placeholder' => 'Category']) !!}
                                            </div>
                                            {!! Form::submit(' Save ',['class'=>'btn btn-primary categ-btn'])!!}
                                        </div>
                                    </div>

                                {!! Form::close() !!}
                            </div><!-- /.tab-pane -->
                        </div> <!-- box-body -->
                    </div> <!-- box -->
                </div>
            <div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
