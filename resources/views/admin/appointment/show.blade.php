@extends('admin.admin_layout')
@section('content')
    

	<div class="content">
		<div class="row">
			<div class="col-sm-4 col-3">
				<h4 class="page-title">Appointments</h4>
			</div>
			<div class="col-sm-8 col-9 text-right m-b-20">
				<a href="{{route('appointment.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
				@if(count($appointments) > 0)
					<table class="table table-striped custom-table">
						<thead>
							<tr>

								<th>Patient Name</th>
								<th>Age</th>
								<th>Doctor Name</th>
								<th>Department</th>
								<th>Appointment Date</th>
								<th>Appointment Time</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($appointments as $appointment)
							<tr>
								<td>{{$appointment->patients->name}}</td>
								<td>{{$appointment->age}}</td>
								<td>{{$appointment->doctors->first_name}} {{$appointment->doctors->last_name}}</td>
								<td>{{$appointment->departments->name}}</td>
								<td>{{$appointment->date}}</td>
								<td>{{$appointment->start}} Am  && {{$appointment->end}} Pm</td>
								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
										<form action="{{route('appointment.delete',$appointment->id)}}" method="post">
											@csrf
											@method('delete')
												<a class="dropdown-item" style="width:200px; padding-left:76px;" href="{{route('appointment.edit',$appointment->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

												<button style="border:none; width:200px">

													<i class="fa fa-trash-o m-r-5"></i> Delete

												</button>

										</form>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else

					<p scope="row" class="text-center"><b>No Appointments Found</b></p>

					@endif
				</div>
			</div>
		</div>


@endsection

