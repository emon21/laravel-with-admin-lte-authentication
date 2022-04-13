@extends('layouts.frontend_master')
@section('content')

<div class="container" style="margin-top:50px;">


<div class="d-flex justify-content-center">
    <div class="justify-content-center mb-3">
       <a href="{{ url('login') }}" class="btn btn-danger">Admin login</a>
          <a href="{{ url('register') }}" class="btn btn-success">User Registration</a>
  </div>
</div>


  {{--  <div class="col-sm-12 mb-4">
    <h2 class="text-success text-center" style="font-size:50px;padding-bottom:20px;">All Student List</h2>
    <label for="">Searching Student :</label>
    <form  class="form-inline" action="{{ url('/') }}" method="get">
        <div class="form-group">
            <input type="text" class="form-control " name="search" placeholder="Student Searching...!!">
          </div>
          <div class="form-group col-sm-6">
            <select name="sortby" class="form-control form-control-sm">
                <option value="" class="d-none">Sort By</option>
                <option value="latest">Latest</option>
                <option {{ request('sortby') == 'oldest' ? 'selected' : '' }} value="oldest">Oldest</option>
            </select>
          </div>
          <button type="submit" class="btn btn-outline-success">Search</button>

    </form>
  </div>  --}}
  <div class="row">
    @forelse($students as  $value)
        <div class="col-sm-4 mb-4">
            <div class="card">
            <img class="card-img-top" src="{{ asset('storage') }}/{{ $value->std_picture }}" width="250" height="220" alt="Card image">
            <div class="card-body">
                <h4 class="card-title">{{ $value->name }}</h4>
                <p class="card-text">{{ $value->phone }}</p>
                <a href="#" class="btn btn-primary">See Profile</a>
            </div>
            </div>
        </div>
      @empty
        <span class="alert alert-danger"> No Data found</span>
      @endforelse

    {{--  {{ $data->links() }}  --}}

  </div>
</div>

@endsection
