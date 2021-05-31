@extends('layouts.app')

@section('content')



  <div class="container" style="position:relative; top:50px"> 
  <div class="row justify-content-center">

  @if(count($myreservation) > 0) 

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Gender</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Date Of Birthday</th>
          <th scope="col">Address</th>
          <th scope="col">Country</th>
          <th scope="col">City</th>
          <th scope="col">Zip Code</th>
          <th scope="col">Email</th>
          <th scope="col">Appointment</th>
          <th scope="col">Time</th>
          <th scope="col">Doctor Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($myreservation as $my)
        <tr>
          <td>{{$my->name}}</td>
          <td>

                @if($my->gender == 1)
                        Male
                @elseif($my->gender == 0)
                        Female
                @endif

          </td>
          <td>+{{$my->area_code}}-{{$my->phone_number}}</td>

          <td>{{$my->date_of_birth}}</td>
          <td>{{$my->patient_address}}</td>
          <td>{{$my->country}}</td>
          <td>{{$my->city}}</td>
          <td>{{$my->zip_code}}</td>
          <td>{{$my->email}}</td>
          <td>{{$my->appointment}}</td>
          <td>{{$my->start}}</td>
          <td>{{$my->doctors->first_name}} {{$my->doctors->last_name}}</td>
          <td>
            <a href="{{route('appointment.delete',$my->id)}}" class="btn btn-danger">Cancel</a>
          </td>

        </tr>
        
        @endforeach


        @else

        <p scope="row" class="text-center"><b>No Reservations Found</b></p>



        @endif

      </tbody>
    </table>

  </div>
</div>

@endsection
