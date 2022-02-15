@extends('layouts.frontend_master')
@section('content')

<div class="container" style="margin-top:50px;">
  

<div class="d-flex justify-content-center">
    <div class="justify-content-center mb-3">
       <a href="{{ url('login') }}" class="btn btn-danger">Admin login</a>
          <a href="{{ url('register') }}" class="btn btn-success">User Registration</a>
  </div>
</div>

  
  <div class="col-sm-12 mb-4">
    <h2 class="text-success text-center" style="font-size:50px;padding-bottom:20px;">All Student List</h2>
  </div>
  <div class="row">
    @foreach($data as $key => $value)
  
    @if($value->status =='1')
       {{ $value->status }}
   
    @endif
    <div class="col-sm-4 mb-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('storage/student') }}/{{ $value->std_picture }}" width="250" height="220" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">{{ $value->name }}</h4>
          <p class="card-text">Some example text.</p>
          <a href="#" class="btn btn-primary">See Profile</a>
        </div>
      </div>
    </div>
    @endforeach

    {{--  {{ $data->links() }}  --}}

  </div>
</div>

@endsection