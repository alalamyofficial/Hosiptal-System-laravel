@extends('admin.admin_layout')
@section('content')
    

	<div class="content">
		<div class="row">
			<div class="col-sm-4 col-3">
				<h4 class="page-title">Vaccine Requests</h4>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
				@if(count($vaccines) > 0)
					<table class="table table-striped custom-table">
						<thead>
							<tr>

								<th>Name</th>
								<th>Age</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Country</th>
								<th>City</th>
								<th>Gender</th>
								<th>Account</th>
								<th>State</th>

								<!-- <th class="text-right">Action</th> -->
							</tr>
						</thead>
						<tbody>
							@foreach($vaccines as $vaccine)
							<tr>
								<td>{{$vaccine->name}}</td>
								<td>{{$vaccine->age}}</td>
								<td>{{$vaccine->email}}</td>
								<td>{{$vaccine->phone_number}}</td>
								<td>{{$vaccine->country}}</td>
								<td>{{$vaccine->city}}</td>
								<td>
									@if($vaccine->gender == '1')
										Male
									@elseif($vaccine->gender == '0')
										Female

									@endif                                       
								
								</td>
								<td>{{$vaccine->users->name}}</td>
                                <td>

                                    @if($vaccine->status == 1)
                                        <p class="badge badge-success">Confirmed</p>
                                    @elseif($vaccine->status == 0)
                                        <p class="badge badge-danger">Not Confirmed</p>
                                    @endif

                                </td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else

					<p scope="row" class="text-center"><b>No Vaccine Requests Found</b></p>

					@endif
				</div>
			</div>
		</div>


@endsection

