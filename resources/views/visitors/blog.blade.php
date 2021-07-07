@extends('website')
@section('mainsite')

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Our Blog</h2>
                            <p>Home<span>/</span>Our Blog</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

                        @foreach($posts as $post)
                        <article class="blog_item">
                            <div class="blog_item_img">
                            <a href="{{route('blog.post', $post->id)}}">
                            
                                <img class="card-img rounded-0" src="{{$post->image}}" alt="">
                            </a>
                                <a href="{{route('blog.post', $post->id)}}" class="blog_item_date">
                                    <h3>{{$post->created_at->diffForHumans()}}</h3>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{route('blog.post', $post->id)}}">
                                    <h2>{{$post->title}}</h2>
                                </a>
                                <p>{!!$post->description!!}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="far fa-user"></i> {{$post->tags}}</a></li>
                                </ul>
                            </div>
                        </article>
                        @endforeach



                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

 @endsection