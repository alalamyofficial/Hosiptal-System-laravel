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

                        <h4 class="page-title">Edit Patient</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{route('patient.update',$patient->id)}}" method="POST">
                        @csrf
                        @method('patch')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" name="name" value="{{$patient->name}}" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" value="{{$patient->email}}" name="email" type="email">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Age <span class="text-danger">*</span></label>
                                        <input class="form-control" name="age" type="number" value="{{$patient->age}}">
                                    </div>
                                </div>
       
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control select" width="300px" name="gender">
                                            
                                            <option value="1" <?php echo (request()->session()->get('gender') == 'Male') ? 'selected' : '' ?>>Male</option>
                                            <option value="0" <?php echo (request()->session()->get('gender') == 'Female') ? 'selected' : '' ?>>Female</option>  
                                        
                                        </select>
                                        
                                    </div>
								</div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" type="text" name="phone_number" value="{{$patient->phone_number}}">
                                    </div>
                                </div>

                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Disease Type <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="disease_type" value="{{$patient->disease_type}}">
                                    </div>
                                </div>

                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-success submit-btn">Update Patient</button>
                            </div>
                        </form>
                    </div>
                </div>
                





@endsection