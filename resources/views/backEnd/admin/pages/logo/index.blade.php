@extends('backEnd.admin.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage logo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">logo</li>
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
                 <h2 class="card-title">Manage logo</h2>
                 <a href="{{ Route('logo.create') }}" class="float-sm-right"><i class="fa fa-plus-circle"></i>
                 Add logo</a>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>User Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($logos as $key=>$logo)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $logo->title }}</td>
                      <td>
                        <img src="{{ Storage::url($logo->image)}}" alt="" width="100px">
                      </td>
                    
                      <td>
                        @if($logo->status == 1)
                           <a href="{{asset('/logo/statusChange')}}/{{$logo->id}}/{{$logo->status}}" class="btn btn-success">Published</a>
                        @else
                           <a href="{{asset('/logo/statusChange')}}/{{$logo->id}}/{{$logo->status}}" class="btn btn-danger">UnPublished</a>
                        @endif
                      </td>
                      <td>
                        {{ $logo->user->name }}
                      </td>
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