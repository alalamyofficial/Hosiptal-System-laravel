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
				@if(count($blogs) > 0)
				<div class="row">
						@foreach($blogs as $post)
							<div class="col-sm-4 col-md-4 col-lg-4">
									<div class="blog grid-blog">
											<div class="dropdown dropdown-action" style="left: 302px;">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(55px, 27px, 0px);">
													<form action="{{route('blog.delete',$post->id)}}" method="post">
														@csrf
														@method('delete')
															<a class="dropdown-item" style="width:200px; padding-left:76px;" href="{{route('blog.edit',$post->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

															<button style="border:none; width:200px">

																<i class="fa fa-trash-o m-r-5"></i> Delete

															</button>

													</form>
												</div>
											</div>										
											<div class="blog-image">
											<a href="{{route('blog.single',$post->id)}}">
											<img class="img-fluid" src="{{url($post->image)}}" alt="">
											<!-- style="width:200px" -->
											</a>
										</div>
										<div class="blog-content">
											<h3 class="blog-title"><a href="{{route('blog.single',$post->id)}}">{{$post->title}}</a></h3>
											<p>{{\Illuminate\Support\Str::limit(strip_tags($post->description),100)}}</p>
											<a href="{{route('blog.single',$post->id)}}" class="read-more"><i class="fa fa-long-arrow-right"></i> Read More</a>
											<div class="blog-info clearfix">
												<div class="post-left">
													<ul>
														<li><i class="fa fa-calendar"></i> <span>{{$post->created_at->diffForHumans()}}</span></a></li>
													</ul>
												</div>
												<div class="post-right"><a href="#."><a href="#."><i class="fa fa-tags"></i>{{$post->tags}}</a></div>

											</div>
										</div>
									</div>
								<!-- </div> -->
							</div>    
						@endforeach
				</div>		
				@else

					<p scope="row" class="text-center"><b>No Articles Found</b></p>

				@endif

	</div>				


@endsection