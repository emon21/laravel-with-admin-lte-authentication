@extends('layouts.admin_master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title pt-3">Product All Information</h3>
                        <a href="{{ url('admin/student/create') }}" class="btn btn-outline-warning float-right mt-1"
                            style="margin-top:-42px;font-size:16px;">Add Student +</a>
                    </div>
                    <!-- /.card-header -->
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Sl No</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Slug</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Stock</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $list)
                                    <tr>
                                        <td>{{ $list->id }}</td>
                                        <td class="text-center">{{ $list->title }}</td>
                                        <td class="text-center">{{ $list->slug }}</td>
                                        <td class="text-center">{{ $list->price }}</td>
                                        <td class="text-center">{{ $list->stock }}</td>
                                        <td class="text-center">{{ $list->total }}</td>
                                        <td class="text-center">{{ $list->status }}</td>

                                        <td class="text-center">
                                             @if($list->status=='1')
                                           <span class="text-success">Active</span>


                                            @else
                                           <span class="text-danger">Inactive</span>

                                            @endif</td>


                                            <td class="text-center">

                                                <img
                                                src="{{ asset('storage/') }}/{{ $list->image }}"
                                                width="150" height="85"></td>

                                        <td class="text-center">
                                             @if($list->status=='1')

                                              <a href="{{ url('admin/student/studentstatus',$list->id) }}" class="btn btn-outline-danger mr-2">Inactive</a>
                                            @else
                                            <a href="{{ url('admin/student/studentstatus',$list->id) }}" class="btn btn-outline-success mr-2">Active</a>


                                            @endif
                                            <a href="{{ url('admin/product/productshow', $list->slug) }}"
                                                class="btn btn-outline-warning mr-2">View</a>

                                                <a href="{{ url('admin/student/studentedit', $list->id) }}"
                                                    class="btn btn-outline-success">Edit</a>

                                                    <a href="{{ url('admin/student/studentdelete', $list->id) }}"
                                                        class="btn btn-outline-danger ml-2"
                                                        onclick="return confirm('Are You Sure Delete this Item y/n ?')">Delete
                                                    </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.card -->
        </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->

@endsection
