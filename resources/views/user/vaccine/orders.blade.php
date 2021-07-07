@extends('layouts.app')

@section('content')



  <div class="container" style="position:relative; top:50px"> 
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Your Vaccine Requests</h4><br>
    </div><br>
  <div class="row justify-content-center">

  @if(count($vaccines) > 0) 

    <b> We Will Contact You until your turn is coming up </b><br><br>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Gender</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Country</th>
          <th scope="col">City</th>
          <th scope="col">Email</th>
          <th scope="col">State</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($vaccines as $my)
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

            @if($my->status == 1)
                <h5>
                  <p class="badge badge-success">Confirmed</p>
                </h5>
            @elseif($my->status == 0)
                <h5>
                  <p class="badge badge-danger">Not Confirmed</p>
                </h5>
            @endif

          </td>

          <td>
            <a href="{{route('vaccine.destroy',$my->id)}}" class="btn btn-danger">Cancel</a>
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
