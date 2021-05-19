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

                        <h4 class="page-title">Add Doctor Schedule</h4>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="{{route('schedule.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                         
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Doctor</label>
                                        <select class="form-control select" name="doctor_id">
                                        <option value="">Select</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{$doctor->id}}">{{$doctor->first_name}} {{$doctor->last_name}} </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control select" name="department_id">
                                        <option value="">Select</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Work Days<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="days_work">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Holidays<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="holiday">
                                    </div>
                                </div>

                                <div class="col-lg-6">

                                    <label for="appt">Start:</label>

                                    <input type="time" id="appt" name="start_id" 
                                    min="09:00" max="18:00" required value="{{$doctor->start}}">
                                    <br><br>


                                    <label for="appt">End:</label>

                                    <input type="time" id="appt" name="end_id"
                                    min="09:00" max="18:00" required value="{{$doctor->end}}">
                                    <br><br>
                                </div>

                    </div>
                            

                            <br><br>            

       

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Create Schedule</button>
                            </div>

                        </form>
                </div>

            </div>   




@endsection