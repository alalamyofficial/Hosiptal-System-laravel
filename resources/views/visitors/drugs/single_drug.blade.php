@extends('website')
@section('mainsite')

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Drugs</h2>
                            <p>Home<span>/</span>Drugs</p>
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
                @foreach($drugs as $drug)
                    <div class="col-sm-6 col-lg-12">
                        <div class="single_blog_item">
                            <div class="single_blog_img">
                                <img src="{{asset($drug->image)}}" alt="drug">
                            </div>
                            <div class="single_text">
                                <div class="single_blog_text">
                                    <h3>{{$drug->name}}</h3><br>
                                    <b>Category</b> : <br><p>{{$drug->category}}</p><br>
                                    <h3>{{$drug->bio}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--::drug_part end::-->

 @endsection