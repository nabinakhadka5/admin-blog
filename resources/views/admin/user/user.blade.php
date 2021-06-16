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
          <form role="form" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="username">Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="user name" value = "{{ old('username') }}">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" value = "{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                  </div>


                  <div class="form-group">
                    <label for="status">Status</label>
                    <div class="checkbox">
                    <label for="status"><input type="checkbox" class="checkbox" id="status" name="status" @if(old('status') == 1)
                        checked @endif value="1">status</label>
                </div>
                  </div>

                  <div class="form-group">
                      <label for="">Assigned Role</label>
                      <div class="fow">
                          @foreach ($role as $role)
                          <div class="col-lg-3">
                            <div class="checkbox">
                                <label for =""><input type="checkbox" name="role[]" value="{{ $role->id }}" >{{ $role->name }}</label>
                            </div>
                        </div>
                          @endforeach
                    </div>
                </div>

                {{-- <div class="col-lg-4">
                    <label for="">Assigned roles</label>
                     @foreach ($role as $roles)
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="role[]" value="{{ $roles->id }}">{{ $roles->name }}</label>
                            </div>
                    @endforeach
                </div> --}}
              </div>
            </div>
            <!-- /.box-body -->

             <div class="box-footer">
              <input type="submit" class="btn btn-primary">
              <a href='{{ route('user.index') }}' class="btn btn-warning">Back</a>
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
