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
                <div class="row mx-auto d-block">
                    <div class="col-sm-12 p-0">
                        <div class="card-deck">
                            <div class="card col-sm-4 p-4">
                                <img src="{{ asset('/storage/profile') }}/{{ $list->user_picture }}"
                                    class="mx-auto d-block img-circle" width="200" height="220">
                                <h2 class="text-center">{{ $list->name }}</h2>
                                <div class="card-body">
                                    {{--  <h4 class="card-title">John Doe</h4>
                                    <p class="card-text">Some example text.</p>  --}}
                                    {{-- <a href="{{ url('admin/profile/change',$list->id) }}" class="btn btn-outline-success mx-auto d-block">See Profile</a> --}}
                                </div>
                            </div>
                            <div class="card bg-dark col-sm-8">
                                <div class="card-body text-left">
                                    <!-- Nav pills -->
                                    <ul class="nav nav-pills" role="tablist">

                                        
                                        <li class="nav-item {{ 'home' == request()->path() ? 'active' : '' }}">
                                            <a class="nav-link @if(url('admin/profile')) @error('old_password') @else active @enderror @endif" data-toggle="pill" href="#home">Change Profile</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link @error('old_password') active @enderror" data-toggle="pill" href="#changepassword">Change Password</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        {{--  Change Profile Start --}}
                                         <div id="home" class="container tab-pane @if(url('admin/profile')) @error('old_password') @else active @enderror @endif"><br>
                                          

                                            @if(session('status'))
                                                <div class="alert alert-success"> {{ session('status') }}</div>
                                            @endif

                                              <form action="{{ url('admin/profile/updateprofile') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="userid" value="{{ $list->id }}">
                                            
                                                <div class="form-group">
                                                    <label>User Name:</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter User Name...!!" value="{{ $list->name }}"
                                                        name="user_name">
                                                        @error('user_name')
                                                             <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Email Name:</label>
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter Email...!!" value="{{ $list->email }}"
                                                        name="user_email">
                                                        @error('user_email')
                                                             <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                </div>

                                                 <div class="form-group">
                                                    <label>User Picture:</label>
                                                    <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="user_picture" id="customFile">
                                                    <label class="custom-file-label" >Choose file</label>
                                                </div>

                                                  {{--  <div class="custom-file bg-white">
                                            <input type="file" class="custom-file-input bg-white" id="customFile"
                                                name="user_picture">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>  --}}


                                                        @error('user_picture')
                                                             <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                </div>
                                                <button type="submit" class="btn btn-outline-info text-white">Update Profile</button>
                                            </form>
                                        </div>
                                        {{--  Change Profile End  --}}

                                        {{--  Change Password Start  --}}
                                        <div id="changepassword" class="container tab-pane  @error('old_password') active @enderror"><br>
                                          

                                            @if(session('status'))
                                                <div class="alert alert-success"> {{ session('status') }}</div>
                                            @endif
                                           <form action="{{ url('admin/profile/password/change') }}" method="post">
                                    {{--  <form action="{{ url('admin/profile/changeprofile') }}" method="post" enctype="multipart/form-data">  --}}
                                                @csrf
                                    <input type="hidden" name="userid" value="{{ $list->id }}">
                                              
                                                <div class="form-group">
                                                    <label>Old Password:</label>
                                                    <input type="password" class="form-control"
                                                        placeholder="Enter Old Password...!!" value="{{ old('old_password') }}"
                                                        name="old_password">
                                                        @error('old_password')
                                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>New Password:</label>
                                                    <input type="password" class="form-control" placeholder="Enter New Password...!!"
                                                        value="{{ old('new_password') }}" name="new_password">
                                                          @error('new_password')
                                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                            @enderror
                                                </div>
                                                <button type="submit" class="btn btn-outline-success">Change Password</button>
                                            </form>
                                        </div>
                                        {{--  Change Password End  --}}
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
