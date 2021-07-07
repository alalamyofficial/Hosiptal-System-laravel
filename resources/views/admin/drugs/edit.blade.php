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

                        <h4 class="page-title">Edit Drug</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{route('drug.update',$drug->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="{{$drug->name}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Image <span class="text-danger">*</span></label>
                                        <input class="form-control-file" type="file" name="image">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Category <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" data-role="tagsinput" name="category" value="{{$drug->category}}" placeholder="Write Category">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Biography</label>
                                        <textarea class="form-control" rows="3" cols="30" name="bio">{{$drug->bio}}</textarea>
                                    </div>
                                </div><br>       
                            <div class="m-t-20 text-center">
                                <button class="btn btn-success submit-btn">Edit Drug</button>
                            </div>
                        </form>
                    </div>
                </div>



@endsection