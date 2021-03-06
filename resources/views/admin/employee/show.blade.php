@extends('admin.admin_layout')
@section('content')

	<div class="content">
		<div class="row">
			<div class="col-sm-4 col-3">
				<h4 class="page-title">Employees</h4>
			</div>
			<div class="col-sm-8 col-9 text-right m-b-20">
				<a href="{{route('employee.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Employee</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
				@if(count($employees) > 0)
					<table class="table table-border table-striped custom-table datatable mb-0">
						<thead>
							<tr>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Gender</th>
								<th>Date Of Birth</th>
								<th>Image</th>
								<th>Role</th>
								<th>Bio</th>
								<th>Join</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
								@foreach($employees as $employee)
							<tr>

								<td>{{$employee->name}}</td>
								<td>{{$employee->phone_number}}</td>
								<td>{{$employee->email}}</td>
								<td>
									@if($employee->gender == '1')
										Male
									@elseif($employee->gender == '0')
										Female

									@endif                                       
								
								</td>
								<td>{{$employee->date_of_birth}}</td>
								<td>
									<img style="width:50px" src="{{url($employee->image)}}" alt="{{$employee->name}}">
								</td>
								<td>{{$employee->role}}</td>

								<td>{{\Illuminate\Support\Str::limit(strip_tags($employee->bio),40)}}</td>
								<td>{{$employee->created_at->diffForHumans()}}</td>
								

								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
										<form action="{{route('employee.delete',$employee->id)}}" method="post">
											@csrf
											@method('delete')
												<a class="dropdown-item" style="width:200px; padding-left:76px;" href="{{route('employee.edit',$employee->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

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

					<p scope="row" class="text-center"><b>No Employees Found</b></p>

					@endif
											
				</div>
			</div>
		</div>    


@endsection