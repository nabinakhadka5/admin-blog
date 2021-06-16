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
          <form role="form" action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="username">Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="username" value = "@if(old('username')) {{ old('username') }} @else {{ $user->username }} @endif">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" value = "@if(old('email')) {{ old('email') }}  @else {{ $user->email }} @endif">
                </div>




                  <div class="form-group">
                    <label for="status">Status</label>
                    <div class="checkbox">
                    <label for="status"><input type="checkbox" class="checkbox" id="status" name="status" @if(old('status') == 1 || $user->status==1)
                        checked @endif value="1">status</label>
                </div>
                  </div>


                  <div class="form-group">
                      <label for="">Assigned Role</label>
                      <div class="row">
                          @foreach ($role as $role)
                          <div class="col-lg-3">
                            <div class="checkbox">
                                <label><input type="checkbox" name="role[]" value="{{ $role->id }}"
                                    @foreach($user->roles as $user_role)
                                    @if($user_role->id == $role->id)
                                    checked
                                     @endif
                                     @endforeach>{{ $role->name }}</label>
                            </div>
                        </div>
                          @endforeach
                    </div>

                      </div>
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
