@extends('admin.admin_layout')
@section('content')

<div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Nurses</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{route('nurse.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Nurse</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
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
										<th>Department</th>
										<th>Country</th>
										<th>City</th>
										<th>Age</th>

										<th>Bio</th>
										<th>Join</th>

										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
                                        @foreach($nurses as $nurse)
									<tr>

										<td>{{$nurse->first_name}} {{$nurse->last_name}}</td>
										<td>{{$nurse->phone_number}}</td>
										<td>{{$nurse->email}}</td>
										<td>
                                            @if($nurse->gender == '1')
                                                Male
                                            @elseif($nurse->gender == '0')
                                                Female

                                            @endif                                       
                                        
                                        </td>
										<td>{{$nurse->date_of_birth}}</td>
										<td>
											<img style="width:50px" src="{{url($nurse->image)}}" alt="{{$nurse->first_name}} {{$nurse->last_name}}">
										</td>
										<td>
										<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{url($nurse->cv)}}">Download Cv</a>
										
										</td>

										

										<td>{{$nurse->departments->name}}</td>

										<th>{{$nurse->country}}</th>
										<th>{{$nurse->city}}</th>
										<th>{{$nurse->age}}</th>
										<td>{{\Illuminate\Support\Str::limit(strip_tags($nurse->bio),40)}}</td>
										<td>{{$nurse->created_at->diffForHumans()}}</td>

										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
												<form action="" method="post">
												@csrf
													<a class="dropdown-item" href="{{route('nurse.edit',$nurse->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												
												</form>
												</div>
											</div>
										</td>
									</tr>

									
									<tr>


									</tr>


                                    
									@endforeach
										

								</tbody>
							</table>
						</div>
					</div>
                </div>    


@endsection