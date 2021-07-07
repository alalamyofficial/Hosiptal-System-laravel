@extends('website')
@section('mainsite')

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Doctors</h2>
                            <p>Home<span>/</span>Doctors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::doctor_part start::-->
    <section class="doctor_part section_padding single_doctor_part">
        <div class="container">
            <div class="row">
                @foreach($doctors as $doctor)
                    <div class="col-sm-6 col-lg-12">
                        <div class="single_blog_item">
                            <div class="single_blog_img">
                                <img src="{{asset($doctor->image)}}" alt="doctor">
                            </div>
                            <div class="single_text">
                                <div class="single_blog_text">
                                    <br>
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h3 class="card-title">Dr {{$doctor->first_name}} {{$doctor->last_name}}</h3><br>
                                            <p class="card-text">Email : {{$doctor->email}} </p><br>
                                            <p class="card-text">Phone Number : {{$doctor->phone_number}} </p><br>
                                            <p class="card-text">Department : {{$doctor->departments->name}} </p><br>
                                            <p class="card-text">Start : {{substr($doctor->start,0,5)}} </p><br>
                                            <p class="card-text">End : {{substr($doctor->end,0,5)}} </p><br>
                                        </div>
                                    </div><br><br>
                                    
                                    <b>{{$doctor->bio}} </b>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--::doctor_part end::-->

 @endsection