@extends('layouts.frontend_master')
@section('content')



        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                @if($std->count() > 0)
                @foreach($std as  $value)
                    <div class="col-sm-4 mb-4">
                        <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/student') }}/{{ $value->std_picture }}" width="250" height="220" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{ $value->name }}</h4>
                            <p class="card-text">{{ $value->phone }}</p>
                            <a href="#" class="btn btn-primary">See Profile</a>
                        </div>
                        </div>
                    </div>
                @endforeach
        @else
             <span class="text-danger"> No Data found</span>
        @endif
            </div>
          </div>
@endsection




