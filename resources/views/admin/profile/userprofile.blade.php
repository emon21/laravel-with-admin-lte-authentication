@extends('layouts.admin_master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content bg-white">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 p-0">
        @error('status')
    <div class="alert alert-success">{{ $message }}</div>
@enderror

            <div class="card  card-outline m-0 border-0" >
              <div class="card-body bg-white border-0">
                 <h2 class="text-center">User Profil Information</h2>
                 @foreach($userlist as $list)
  <img src="{{ asset('/storage/profile') }}/{{ $list->user_picture
 }}" class="mx-auto d-block img-circle"> 
  <h2 class="text-center">{{ auth::user()->name }}</h2>


  <ul class="list-group list-group-unbordered  bg-danger mb-3 w-50 mx-auto">
                            <li class="list-group-item bg-white">
                                <b>Email Address</b> <a class="float-right">{{ $list->email }}</a>
                            </li>
                            <li class="list-group-item bg-white">
                                <b>Registered At</b> <a class="float-right"> {{ $list->created_at->diffForHumans() }} ({{ $list->created_at->format('d-M-Y') }})</a>
                            </li>
                            <li class="list-group-item bg-white">
                                <b>Profile Updated At</b> <a class="float-right">
                                 {{ $list->updated_at->diffForHumans() }} ({{ $list->updated_at->format('d-M-Y') }})</a>
                            </li>
                        </ul>
                <a href="{{ url('admin/profile/change',$list->id) }}" class="btn btn-outline-success btn-block mb-3 w-25 mx-auto">
                                    <b>Go To Settings </b> <i class="fa fa-arrow-right"></i>
                                </a>
                        @endforeach

              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        

           
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
