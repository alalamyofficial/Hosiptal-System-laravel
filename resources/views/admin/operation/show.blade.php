@extends('admin.admin_layout')
@section('content')

<div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Operations</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{route('operation.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Operation</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>Doctors</th>
										<th>Nurses</th>
										<th>Patients</th>
										<th>Department</th>
										<th>Operation Type</th>
										<th>Country</th>
										<th>City</th>
										<th>Address</th>
										<th>Price</th>
										<th>Start</th>
										<th>End</th>
										<th>Created At</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
                                        @foreach($operations as $operation)
									<tr>

										<td>	
											@foreach (explode(',', $operation->doctor) as $dc)
												<h4>
													<span class="badge badge-success">{{$dc}}</span>
												</h4>
											@endforeach 
										</td>

										<td>	
											@foreach (explode(',', $operation->nurse) as $nc)
												<h4>
													<span class="badge badge-danger">{{$nc}}</span>
												</h4>
											@endforeach 
										</td>										

										<td>
											<h4>
												<span class="badge badge-warning">{{$operation->patient}}</span>
											</h4>
										</td>
										<td>{{$operation->departments->name}}</td>
										<td>{{$operation->operation_type}}</td>
										<td>{{$operation->country}}</td>
										<td>{{$operation->city}}</td>
										<td>{{$operation->address}}</td>
										<td>{{$operation->price}} $ </td>
										<td>{{$operation->start}}</td>
										<td>{{$operation->end}}</td>
										<td>{{$operation->created_at->diffForHumans()}}</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
												<form action="{{route('operation.delete',$operation->id)}}" method="post">
													@csrf
													@method('delete')
														<a class="dropdown-item" style="width:200px; padding-left:76px;" href="{{route('operation.edit',$operation->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

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
						</div>
					</div>
                </div>    

@endsection