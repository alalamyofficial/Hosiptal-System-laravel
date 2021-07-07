@extends('admin.admin_layout')
@section('content')
    

	<div class="content">
		<div class="row">
			<div class="col-sm-4 col-3">
				<h4 class="page-title">Beds Requests</h4>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
				@if(count($beds) > 0)
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
							@foreach($beds as $bed)
							<tr>
								<td>{{$bed->name}}</td>
								<td>{{$bed->age}}</td>
								<td>{{$bed->email}}</td>
								<td>{{$bed->phone_number}}</td>
								<td>{{$bed->country}}</td>
								<td>{{$bed->city}}</td>
								<td>
									@if($bed->gender == '1')
										Male
									@elseif($bed->gender == '0')
										Female

									@endif                                       
								
								</td>
								<td>{{$bed->users->name}}</td>
                                <td>

                                    @if($bed->status == 1)
                                        <p class="badge badge-success">Confirmed</p>
                                    @elseif($bed->status == 0)
                                        <p class="badge badge-danger">Not Confirmed</p>
                                    @endif

                                </td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else

					<p scope="row" class="text-center"><b>No Beds Requests Found</b></p>

					@endif
				</div>
			</div>
		</div>


@endsection

