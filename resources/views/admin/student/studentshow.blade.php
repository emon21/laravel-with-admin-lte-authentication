@extends('layouts.admin_master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-success">
                        <h3 class="card-title pt-3">Student Information</h3>
                    </div>

                    @foreach ($studentlist as $list)
                        <div class="card mx-auto d-block mt-4" style="width:400px">
                            <img class="mx-auto d-block mt-4 "
                                src="{{ asset('storage/student') }}/{{ $list->std_picture }}" width="220" height="220">

                            <table class="table table-dark table-striped mt-4">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>:</th>
                                        <th>{{ $list->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Student Email</th>
                                        <th>:</th>
                                        <th>{{ $list->email }}</th>
                                    </tr>
                                    <tr>
                                        <th>Student created_at</th>
                                        <th>:</th>
                                        <th>{{ $list->created_at->diffForHumans() }}</th>
                                    </tr>
                                    @if ($list->updated_at)

                                        <tr>
                                            <th>Student updated_at</th>
                                            <th>:</th>
                                            <th>{{ $list->updated_at->diffForHumans() }}</th>
                                        </tr>
                                    @endif

                                    <tr>
                                        <th>Gender</th>
                                        <th>:</th>
                                        <th>{{ $list->gender }}</th>
                                    </tr>
                                </thead>

                            </table>
                            {{-- <a href="" class="btn btn-outline-success btn-block mb-3 w-50 mx-auto"
                                name="student_update">Update Student</a> --}}

                        </div>
                    @endforeach

                </div>
            </div><!-- /.card -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    </div>
    <!-- /.content-wrapper -->

@endsection
