@extends('layouts.app')

@section('content')



  <div class="container" style="position:relative; top:50px"> 
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach($services as $service)
    <div class="col-sm-4">
    
        <div class="card mb-3" >
        <i class="<?php echo $service->icon;?>" style="position:relative; left:30px; top:10px"></i>
        <div class="card-body">
            <b>
              <h5 class="card-title">{{$service->title}}</h5>
            
            </b>
            <p class="card-text">{{$service->description}}</p>
            <a href="#" class="btn btn-danger">Add To Favorite</a>
        </div>
        </div>        
    
    </div>

    @endforeach  
    
    </div>
  </div>

@endsection
