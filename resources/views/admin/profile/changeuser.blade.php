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
           
{{-- 
@if ($errors->any())
   
    <div class="alert alert-danger">
        <ul>
             @foreach ($errors->any() as $error)
             <li>{{ $error }} </li>
             @endforeach
        </ul>
    </div>
    
@endif --}}
            <div class="card  card-outline m-0 border-0" >
              <div class="card-body bg-white border-0">
                 <h2 class="text-center">User Profil Information</h2>
  <img src="{{ asset('/storage/profile') }}/{{ $userlist->user_picture
 }}" class="mx-auto d-block img-circle"> 
  <h2 class="text-center">{{ auth::user()->name }}</h2>
 @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <form action="{{ url('admin/profile/changeprofile') }}" method="post"  enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="userid" value="{{ $userlist->id }}">
  <ul class="list-group list-group-unbordered  bg-danger mb-3 w-50 mx-auto">
                            <li class="list-group-item bg-white">
                                <b>User Name</b> <a class="float-right"><input type="text" class="bg-white form-control col-sm-12" id="usr" name="name" value="{{ $userlist->name }}"></a>
                            </li>
                            <li class="list-group-item bg-white">
                                <b>User Email</b> <a class="float-right"> <input type="email" class="bg-white form-control" name="email" value="{{ $userlist->email }}"></a>
                            </li>
  <div class="custom-file bg-white">
    <input type="file" class="custom-file-input bg-white" id="customFile" name="user_picture">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>

  <li class="list-group-item bg-white">
                                <b>Old Password</b> <a class="float-right"> <input type="password" class="bg-white form-control" name="old_password" value="{{ old('old_password') }}"></a>
                            </li>

                            <li class="list-group-item bg-white">
                                <b>New Password</b> <a class="float-right"> <input type="password" class="bg-white form-control" name="new_password" value="{{ old('new_password') }}"></a>
                            </li>
                        </ul>
                         <button type="submit" class="btn btn-outline-success btn-block mb-3 w-25 mx-auto">Update Profile</button>
  </form>


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
