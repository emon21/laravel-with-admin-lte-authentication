@extends('layouts.admin_master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="card-title pt-2">Product Information</h3>
                        <a href="{{ url('admin/product/productlist') }}" class="btn btn-outline-success float-right mt-1"
                        style="margin-top:-42px;font-size:16px;"><< Back</a>
                    </div>
                        <div class="card mx-auto d-block mt-4" style="width:400px">
                            <img class="mx-auto d-block mt-4 "
                                src="{{ asset('storage') }}/{{ $products->image }}" width="220" height="220">
                            <table class="table table-dark table-striped mt-4">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>:</th>
                                        <th>{{ $products->title }}</th>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <th>:</th>
                                        <th>{{ $products->price }}</th>
                                    </tr>
                                    <tr>
                                        <th>Stock</th>
                                        <th>:</th>
                                        <th>{{ $products->stock }}</th>
                                    </tr>
                                    <tr>
                                        <th>Total Price</th>
                                        <th>:</th>
                                        <th>{{ $products->total }}</th>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <th>:</th>
                                        @if($products->status == '1')
                                        <th>
                                            <p class="text-success">Active</p>
                                            @else
                                            <p class="text-danger">Inactive</p>
                                         @endif
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            {{-- <a href="" class="btn btn-outline-success btn-block mb-3 w-50 mx-auto"
                                name="student_update">Update Student</a> --}}
                        </div>
                </div>
            </div><!-- /.card -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->

@endsection
