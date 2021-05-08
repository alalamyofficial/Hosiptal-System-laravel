@extends('admin.admin_layout')
@section('content')
    

<div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Ambulance Requests</h4>
                    </div>

                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
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

										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($ambulances as $ambulance)
									<tr>
										<td>{{$ambulance->name}}</td>
										<td>{{$ambulance->age}}</td>
										<td>{{$ambulance->email}}</td>
										<td>{{$ambulance->phone_number}}</td>
										<td>{{$ambulance->country}}</td>
										<td>{{$ambulance->city}}</td>
                                        <td>
                                            @if($ambulance->gender == '1')
                                                Male
                                            @elseif($ambulance->gender == '0')
                                                Female

                                            @endif                                       
                                        
                                        </td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-appointment.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

