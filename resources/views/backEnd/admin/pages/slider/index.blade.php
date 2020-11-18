@extends('backEnd.admin.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">slider</li>
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
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ session()->get('message') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                 <h2 class="card-title">Manage slider</h2>
                 <a href="{{ Route('slider.create') }}" class="float-sm-right"><i class="fa fa-plus-circle"></i>
                 Add slider</a>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>User Name</th>
                      <th>Priority</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sliders as $key=>$slider)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $slider->title }}</td>
                      <td>{{ $slider->desc }}</td>
                      <td>
                        <img src="{{ Storage::url($slider->image)}}" alt="" width="100px">
                      </td>

                      <td>
                        @if($slider->status == 1)
                           <a href="{{asset('/slider/statusChange')}}/{{$slider->id}}/{{$slider->status}}" class="btn btn-success">Published</a>
                        @else
                           <a href="{{asset('/slider/statusChange')}}/{{$slider->id}}/{{$slider->status}}" class="btn btn-danger">UnPublished</a>
                        @endif
                      </td>
                      <td>
                        {{ $slider->user->name }}
                      </td>
                        <td>  {{ $slider->priority }}</td>
                      <td>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
