@extends('layouts.app')

@section('content')



  <div class="container" style="position:relative; top:50px"> 
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach($doctors as $doctor)
    <div class="col-sm-4">
    
        <div class="card mb-3" style="width: 300px;" >
        <img class="card-img-top" src="{{asset($doctor->image)}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$doctor->first_name}} {{$doctor->last_name}}</h5>
            <p class="card-text">Start at {{$doctor->start}} Am</p>
            <p class="card-text">End at {{$doctor->end}} Pm</p>
            <p class="card-text">Department  : {{$doctor->departments->name}} </p>
            <a href="#" class="btn btn-primary">View Profile</a>
        </div>
        </div>        
    
    </div>

    @endforeach  
    
    </div>
  </div>

@endsection
