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
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2> Experienced Doctors</h2>
                        <p>Face replenish sea good winged bearing years air divide wasHave night male also</p>
                    </div>
                </div>
            </div>
            <div class="row">
                        @foreach($doctors as $doctor)
                            <div class="col-sm-6 col-lg-4">
                                <div class="single_blog_item">
                                    <div class="single_blog_img">
                                        <img src="{{asset($doctor->image)}}" alt="doctor">
                                    </div>
                                    <div class="single_text">
                                        <div class="single_blog_text">
                                            <h3>{{$doctor->first_name}} {{$doctor->last_name}}</h3>
                                            <p>{{$doctor->departments->name}}</p><br>
                                            <a href="{{route('single.doctor' , $doctor->id)}}" class="read-more"><i class="fas fa-arrow-right"></i> Read More</a>
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