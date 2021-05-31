@extends('website')
@section('mainsite')


    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>services</h2>
                            <p>Home<span>/</span>services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- feature_part start-->
    <section class="feature_part single_feature_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-8">
                    <div class="feature_item">
                        <div class="row">

                            @foreach($services as $service)
                            <div class="col-lg-4 col-sm-4">
                                <div class="single_feature">
                                    <div class="single_feature_part">
                                        <span class="single_feature_icon"><i class="<?php echo $service->icon;?>"></i></span>
                                        <h4>{{$service->title}}</h4>
                                        <p>{{$service->description}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature_part start-->

@endsection
