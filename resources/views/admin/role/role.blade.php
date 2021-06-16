@extends('admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
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
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Titles</h3>
          </div>
          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('role.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="name">
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">Posts permission</label>
                        @foreach ($permissions as $permission)
                            @if($permission->for == 'post')
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name=permission[] value="{{ $permission->id }}"> {{ $permission->name }}</label>
                            </div>
                            @endif
                        @endforeach

                    </div>
                    <div class="col-lg-4">
                        <label for="">User permission</label>
                         @foreach ($permissions as $permission)
                                @if($permission->for == 'users')
                                <div class="checkbox">
                                    <label for=""><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @endif

                        @endforeach
                    </div>

                    <div class="col-lg-4">
                        <label for="">Other permission</label>
                         @foreach ($permissions as $permission)
                                @if($permission->for == 'others')
                                <div class="checkbox">
                                    <label for=""><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @endif

                        @endforeach
                    </div>

</div>

             <div class="box-footer">
              <input type="submit" class="btn btn-primary">
              <a href='{{ route('role.index') }}' class="btn btn-warning">Back</a>
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
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection
