@extends('admin.admin_layout')
@section('content')

	<div class="content">
		<div class="row">
			<div class="col-sm-4 col-3">
				<h4 class="page-title">Doctors</h4>
			</div>
			<div class="col-sm-8 col-9 text-right m-b-20">
				<a href="{{route('doctor.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
				@if(count($doctors) > 0)
					<table class="table table-border table-striped custom-table datatable mb-0">
						<thead>
							<tr>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Gender</th>
								<th>Date Of Birth</th>
								<th>Image</th>
								<th>Cv</th>
								<th>Bio</th>
								<th>Join</th>
								<th>Start</th>
								<th>End</th>
								<th>Department</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
								@foreach($doctors as $doctor)
							<tr>

								<td>{{$doctor->first_name}} {{$doctor->last_name}}</td>
								<td>{{$doctor->phone_number}}</td>
								<td>{{$doctor->email}}</td>
								<td>
									@if($doctor->gender == '1')
										Male
									@elseif($doctor->gender == '0')
										Female

									@endif                                       
								
								</td>
								<td>{{$doctor->date_of_birth}}</td>
								<td>
									<img style="width:50px" src="{{url($doctor->image)}}" alt="{{$doctor->first_name}} {{$doctor->last_name}}">
								</td>
								<td>
								<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{url($doctor->cv)}}">Download Cv</a>
								
								</td>

								<td>{{\Illuminate\Support\Str::limit(strip_tags($doctor->bio),40)}}</td>
								<td>{{$doctor->created_at->diffForHumans()}}</td>
								
								<td>{{substr($doctor->start,0,5)}}</td>
								<td>{{substr($doctor->end,0,5)}}</td>
								<td>{{$doctor->departments->name}}</td>

								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
										<form action="{{route('doctor.delete',$doctor->id)}}" method="post">
											@csrf
											@method('delete')
												<a class="dropdown-item" style="width:200px; padding-left:76px;" href="{{route('doctor.edit',$doctor->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

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

					<p scope="row" class="text-center"><b>No Doctors Found</b></p>

					@endif		
				</div>
			</div>
		</div>    


@endsection