@extends('admin.admin_layout')
@section('content')

<div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Schedules</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{route('schedule.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>Doctor Name</th>
										<th>Department</th>
										<th>Days Work</th>
										<th>Holidays</th>
										<th>Start</th>
										<th>End</th>
										<th>Created At</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
                                        @foreach($schedules as $schedule)
									<tr>

										<td>{{$schedule->doctors->first_name}} {{$schedule->doctors->last_name}}</td>
										<td>{{$schedule->departments->name}}</td>
										<td>{{$schedule->days_work}}</td>
										<td>{{$schedule->holiday}}</td>
										<td>{{$schedule->start_id}}</td>
										<td>{{$schedule->end_id}}</td>
										<td>{{$schedule->created_at->diffForHumans()}}</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
												<form action="" method="post">
												@csrf
													<a class="dropdown-item" href="{{route('schedule.edit',$schedule->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
												
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</form>
												</div>
											</div>
										</td>
									</tr>
                                        @endforeach

								</tbody>
							</table>
						</div>
					</div>
                </div>    

@endsection