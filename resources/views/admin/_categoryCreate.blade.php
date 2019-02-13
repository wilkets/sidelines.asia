@extends('layouts.master')
@section('title', 'Sidelines.ph')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box box-primary">
                        <div class="box-header">
                          <h2 class="sidelines-box-header"><span class="fa fa-plus"></span> Add Category</h2>
                        </div><!-- /.box-header -->
                        <hr/>
                        <div class="box-body">
                            <div class="tab-pane" id="settings">
                                {!! Form::open(array('route' => 'categories.store', 'class' => 'form form-horizontal')) !!}

                                    <div class="form-group">
                                        {!! Form::label('categories', 'Category Name', ['class' => 'col-sm-2 control-label', 'style'=>'margin-top:5px; margin-left:5px;']) !!}
                                        <div class="col-sm-8">
                                            <div class="field_wrapper">
                                                {!! Form::text('category[]', null, ['class' => 'form-control categ-field', 'placeholder' => 'Category','required']) !!}
                                                <a href="javascript:void(0);" class="add_button" title="Add field">
                                                    <i class="glyphicon glyphicon-plus-sign text-green"></i>
                                                </a>
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
