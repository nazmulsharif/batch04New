@extends('backEnd.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">
                  Edit user
                </h2>
                <a href="{{Route('user.manage')}}" class="btn btn-info float-sm-right">
                    <i class="fa fa-user"></i>
                  Manage User
                </a>
              </div>
              <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session()->get('message')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                          @csrf

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  autocomplete="name" autofocus value="{{ $user->name }}">

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value=" {{ $user->email}}"  autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                              <div class="col-md-6">
                                  <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value=""  autocomplete="image">
                                  <input type="hidden" value="{{ $user->image }}" name="old_image">
                                  @error('image')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  @if(isset($user->image))
                                    <img src="{{ Storage::url($user->image) }}" alt="" width="100px">
                                  @else
                                     <img src="{{ asset('image/images.png') }}" alt="" width="100px">
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                              <div class="col-md-6 mt-2">
                                 <input type="radio" name ="user_type" value="super_admin"{{ $user->user_type == 'super_admin'? 'checked':''}} ><span class="font-weight-bold">super_admin</span>
                                 <input type="radio" name ="user_type" value="admin"{{ $user->user_type == 'admin'? 'checked':''}}><span class="font-weight-bold">admin</span>
                                  @error('user_type')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                           <div class="form-group row">
                              <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                              <div class="col-md-6 mt-2">
                                 <input type="radio" name ="gender" value="male"{{ $user->gender == 'male'? 'checked':''}}><span class="font-weight-bold">Male</span>
                                 <input type="radio" name ="gender" value="female"><span class="font-weight-bold"{{ $user->gender == 'female'? 'checked':''}}>female</span>
                                  @error('gender')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                        
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Update') }}
                                  </button>
                              </div>
                          </div>
                      </form>
              </div>
            </div>
          </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  @endsection