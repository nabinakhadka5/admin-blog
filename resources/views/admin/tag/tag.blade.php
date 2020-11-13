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
            <form role="form" action="{{ route('tag.store') }}" method="POST">
                @csrf
              <div class="box-body">
                  <div class="col-lg-offset-4 col-lg-6">
                    <div class="form-group">
                        <label for="name">Tag Title</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter title">
                      </div>

                        <div class="form-group">
                          <label for="slug">Tag Slug</label>
                          <input type="text" name="slug" class="form-control" placeholder="Enter Slug" required=true>
                        </div>


              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
                  </div>
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
