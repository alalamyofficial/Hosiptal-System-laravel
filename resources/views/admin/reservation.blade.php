@extends('admin.admin_layout')
@section('content')

<div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Reservation</h4>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
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
                                <th scope="col">User</th>
                                <th scope="col">Join</th>

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
                                <td>{{$my->users->name}}</td>
                                <td>{{$my->created_at->diffForHumans()}}</td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
						</div>
					</div>
                </div>    

@endsection