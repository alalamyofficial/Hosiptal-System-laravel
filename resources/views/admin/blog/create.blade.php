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

                        <h4 class="page-title">Add Blog</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="title">
                                    </div>
                                </div>


                                <div class="col-sm-6">
									<div class="form-group">
										<label>Post Image</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="avatar" src="{{asset('assets2/img/user.jpg')}}">
											</div>
											<div class="upload-input">
												<input type="file" class="form-control" name="image">
											</div>
										</div>
									</div>
                                </div>


                            </div>

							<div class="form-group">
                                <label>Short Biography</label>
                                <textarea style="height:400px" class="ckeditor form-control" rows="3" id="mytextarea" cols="30" name="description"></textarea>
                            </div>
                  
                                
                                <br><br>    
                            

       

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Create Blog</button>
                            </div>
                            
                        </form>
                    </div>
                </div>




@endsection