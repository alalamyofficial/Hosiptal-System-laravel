@extends('admin.admin_layout')
@section('content')

		<div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Blogs</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{route('blog.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Blog</a>
                    </div>
                </div>
				<div class="row">

						@foreach($posts as $post)
							<div class="col-sm-4 col-md-4 col-lg-4">
									<div class="blog grid-blog">
										<div class="blog-image">
											<a href="blog-details.html">
											<img class="img-fluid" src="{{url($post->image)}}" alt="" >
											<!-- style="width:200px" -->
											</a>
										</div>
										<div class="blog-content">
											<h3 class="blog-title"><a href="blog-details.html">{{$post->title}}</a></h3>
											<p>{!! $post->description !!}</p>
											<a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i> Read More</a>
											<div class="blog-info clearfix">
												<div class="post-left">
													<ul>
														<li><a href="#."><i class="fa fa-calendar"></i> <span>{{$post->created_at->diffForHumans()}}</span></a></li>
													</ul>
												</div>
												<div class="post-right"><a href="#."><a href="#."><i class="fa fa-eye"></i>8</a></div>

											</div>
										</div>
									</div>
								<!-- </div> -->
							</div>    
						@endforeach
				</div>		

		</div>				


@endsection