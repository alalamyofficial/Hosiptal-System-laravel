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

            <h4 class="page-title">Add Report</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('report.store')}}" method="POST" enctype="multipart/form-data">
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

                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Report Type</label>
                            <select class="form-control select" width="300px" name="type">
                                <option value="1">Normal</option>
                                <option value="0">Death</option>
                            </select>
                        </div>
                    </div> 

                </div>

                <div class="form-group">
                    <label>Short Biography</label>
                    <textarea style="height:400px" class="ckeditor form-control" rows="3" id="mytextarea" cols="30" name="bio"></textarea>
                </div>
        
                    
                    <br><br>    
                



                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Create Report</button>
                </div>
                
            </form>
        </div>
    </div>




@endsection