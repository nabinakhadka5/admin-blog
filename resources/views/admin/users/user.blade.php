@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- /.box -->
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ttiles</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter title">
                      </div>


                      <div class="form-group">
                          <label for="subtitle">Post Sub title</label>
                          <input type="text" name="subtitle" class="form-control" placeholder="Enter sub title">
                        </div>

                        <div class="form-group">
                          <label for="slug">Post Slug</label>
                          <input type="text" name="slug" class="form-control" placeholder="Enter Slug">
                        </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="image">File input</label>
                        <input type="file" name="image" id="image">
                      </div>

                                  <br>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="status"> Publish
                        </label>
                      </div>
                    </div>
                    <!-- /.box-body -->

                  </div>

                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Write Post Body
                        <small>Simple and fast</small>
                      </h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-minus"></i></button>
                      </div>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <form>
                        <textarea class="textarea" name="body" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </form>
                    </div>
                  </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->





        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
