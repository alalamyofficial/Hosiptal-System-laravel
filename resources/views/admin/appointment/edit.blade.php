@extends('admin.admin_layout')
@section('content')
    



        <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                        <h4 class="page-title">Edit Appointment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-2">
                        <form action="{{route('appointment.update',$appointment->id)}}" method="POST">
                            @csrf 

                            <div class="row">
                                <div class="col-md-6">
									<div class="form-group">
										<label>Patient Name</label>
										<select class="select" name="patient_id">
											<option>Select</option>
                                            @foreach($patients as $patient)
											<option value="{{$patient->id}}">{{$patient->name}}</option>
                                            @endforeach
										</select>
									</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="select" name="department_id">
                                            <option>Select</option>
                                            @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="select" name="doctor_id">
											<option>Select</option>
                                            @foreach($doctors as $doctor)
											<option value="{{$doctor->id}}">{{$doctor->first_name}} {{$doctor->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="cal-icon">
                                            <input type="date" name="date" class="form-control datetimepicker" value="{{$appointment->date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time Start</label>
                                        <div class="time-icon">
                                            <input type="text" name="start" class="form-control" id="datetimepicker3" value="{{$appointment->start}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time End</label>
                                        <div class="time-icon">
                                            <input type="text" name="end" class="form-control" id="datetimepicker3" value="{{$appointment->end}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Email</label>
                                        <input class="form-control" name="patient_email" type="email" value="{{$appointment->patient_email}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Age</label>
                                        <input class="form-control" name="age" type="number" value="{{$appointment->age}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Patient Phone Number</label>
                                        <input class="form-control" name="patient_phone" type="text" value="{{$appointment->patient_phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" rows="4" name="message" class="form-control">{{$appointment->message}}</textarea>
                            </div>
                            
                            <div class="m-t-20 text-center">
                                <button class="btn btn-success submit-btn">Edit Appointment</button>
                            </div>
                        </form>
                    </div>
                </div>


@endsection