@extends('backEnd.admin.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage about Section</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">about</li>
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
                 <h2 class="card-title">Manage about</h2>
                 <a href="{{ Route('aboutSection.create') }}" class="float-sm-right"><i class="fa fa-plus-circle"></i>
                 Add about</a>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Title</th>
                      <th>Sub Title</th>
                      <th>Description</th>
                      <th>List</th>
                      <th>Final Description</th>
                      <th>Status</th>
                      <th>User Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($aboutSections as $key=>$about)
                            @php
                               $lists =  explode('<>',$about->list);
                            @endphp
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $about->title }}</td>
                      <td>{{ $about->sub_title }}</td>
                      <td>{{ $about->description }}</td>
                      <td>
                          <ol>
                              @foreach($lists as $list)
                                <li>{{ $list }}</li>
                              @endforeach

                          </ol>



                      </td>
                      <td>{{ $about->final_desc }}</td>
                      <td>
                        @if($about->status == 1)
                           <a href="{{asset('/aboutSection/statusChange')}}/{{$about->id}}/{{$about->status}}" class="btn btn-success">Published</a>
                        @else
                           <a href="{{asset('/aboutSection/statusChange')}}/{{$about->id}}/{{$about->status}}" class="btn btn-danger">UnPublished</a>
                        @endif
                      </td>
                      <td>
                        {{ $about->user->name }}
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
