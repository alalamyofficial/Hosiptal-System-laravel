@extends('layouts.app')

@section('content')



  <div class="container" style="position:relative; top:50px"> 
    
      <div class="col-sm-4 col-3">
          <h4 class="page-title">Your Ambulance Requests</h4><br>
      </div><br>

  <div class="row justify-content-center">

  @if(count($ambulances) > 0) 

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Gender</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Country</th>
          <th scope="col">City</th>
          <th scope="col">Email</th>

          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($ambulances as $my)
        <tr>
          <td>{{$my->name}}</td>
          <td>

                @if($my->gender == 1)
                        Male
                @elseif($my->gender == 0)
                        Female
                @endif

          </td>
          <td>{{$my->phone_number}}</td>

          <td>{{$my->country}}</td>
          <td>{{$my->city}}</td>
          <td>{{$my->email}}</td>

          <td>
            <a href="{{route('ambulance.destroy', $my->id)}}" class="btn btn-danger">Cancel</a>
          </td>

        </tr>
        
        @endforeach


        @else

        <p scope="row" class="text-center"><b>No Orders Found</b></p>



        @endif

      </tbody>
    </table>

  </div>
</div>

@endsection
