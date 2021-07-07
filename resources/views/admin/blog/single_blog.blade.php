@extends('admin.admin_layout')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Blog View</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="blog-view">
                <article class="blog blog-single-post">
                    @foreach($blogs as $blog)
                    <h3 class="blog-title">{{$blog->title}}</h3>
                    <div class="blog-info clearfix">
                        <div class="post-left">
                            <ul>
                                <li><a href="#."><i class="fa fa-calendar"></i> <span>{{$blog->created_at->diffForHumans()}}</span></a></li>
                                <li><a href="#."><i class="fa fa-tags"></i> <span>By Andrew Dawis</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-image">
                        <a href="#."><img alt="" src="{{asset($blog->image)}}" class="img-fluid"></a>
                    </div>
                    <div class="blog-content">
                        <p>{!!$blog->description!!}</p>
                    </div>
                    @endforeach
                </article>

            </div>
        </div>
    </div>
</div>


@endsection