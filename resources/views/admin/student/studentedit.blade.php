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
                        <div class="card  card-outline m-0 border-0">
                            <div class="card-body bg-white border-0">
                                <h2 class="text-center">User Profil Information</h2>

                                {{-- @error('status')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror --}}

                                <form action="{{ url('admin/student/studentupdate') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $data->id }}" name="student_id">
                                    <ul class="list-group list-group-unbordered  bg-danger mb-3 w-50 mx-auto">
                                        <li class="list-group-item bg-white">
                                            <b>Student Name</b><input type="text"
                                                class="bg-white form-control col-sm-12 mt-2" id="usr" name="student_name"
                                                placeholder="Enter Student Name...!!" value="{{ $data->name }}">
                                            @error('student_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </li>
                                        <li class="list-group-item bg-white">
                                            <b>Email Address </b><input type="text"
                                                class="bg-white form-control col-sm- mt-2" id="usr" name="student_email"
                                                placeholder="Enter email...!!" value="{{ $data->email }}">
                                            @error('student_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </li>
                                        <li class="list-group-item bg-white">
                                            <b>Password</b><input type="text" class="bg-white form-control col-sm-12 mt-2"
                                                id="usr" name="student_password" placeholder="Password...!!"
                                                value="{{ $data->password }}">
                                            @error('student_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </li>
                                        <img src="{{ asset('storage/student') }}/{{ $data->std_picture }}" width="250"
                                            height="250" class="mt-3 mb-3 d-block mx-auto bg-light">
                                        <li class="list-group-item bg-white">
                                            <label class="custom-file-label" for="customFile">Student Picture</label>
                                            <input type="file" class="custom-file-input bg- mt-2" name="student_picture"
                                                id="customFile" value="{{ $data->name }}">
                                            @error('student_picture')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </li>
                                    </ul>
                                    <button type="submit" class="btn btn-outline-success btn-block mb-3 w-25 mx-auto">Update
                                        Student</button>
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
