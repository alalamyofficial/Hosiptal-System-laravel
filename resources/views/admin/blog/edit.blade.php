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

            <h4 class="page-title">Edit Blog</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="title" value="{{$blog->title}}">
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
                                    <input type="file" class="form-control" name="image" value="{{$blog->image}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Tags" name="tags" data-role="tagsinput" value="{{$blog->tags}}" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>Short Biography</label>
                    <textarea style="height:400px" class="ckeditor form-control" rows="3" id="mytextarea" cols="30" name="description">
                        {{$blog->description}}
                    </textarea>
                </div>
        
                    
                    <br><br>    
                



                <div class="m-t-20 text-center">
                    <button class="btn btn-success submit-btn">Update Blog</button>
                </div>
                
            </form>
        </div>
    </div>




@endsection