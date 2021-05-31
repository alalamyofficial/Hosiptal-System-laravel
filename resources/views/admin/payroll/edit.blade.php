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

                        <h4 class="page-title">Edit Payroll</h4>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="{{route('payroll.update',$payroll->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="{{$payroll->name}}">
                                    </div>
                                </div>
                         
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control select" name="role">

                                            <option value="doctor">Doctor</option>
                                            <option value="nurse">Nurse</option>
                                            <option value="therapist">Therapist</option>
                                            <option value="janitorial_staff">Janitorial staff</option>
                                            <option value="clerical_staff">Clerical staff</option>
                                            <option value="information-technology-staff">Information technology staff</option>
                                            <option value="food_services_staff">Food services staff</option>
                                            <option value="environmental_services_staff">Environmental services staff</option>
                                            <option value="pharmacy_staff">Pharmacy staff</option>
                                            <option value="cleaner">Cleaner</option>
                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Salary<span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="salary" value="{{$payroll->salary}}">
                                    </div>
                                </div>

                    </div>
                            

                            <br><br>            

       

                            <div class="m-t-20 text-center">
                                <button class="btn btn-success submit-btn">Edit Payroll</button>
                            </div>

                        </form>
                </div>

            </div>   




@endsection