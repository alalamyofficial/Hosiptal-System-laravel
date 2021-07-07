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

                        <h4 class="page-title">Add Drug</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{route('drug.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name">
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
                                        <input class="form-control" data-role="tagsinput" type="text" name="category" placeholder="Write Category">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Biography</label>
                                        <textarea class="form-control" rows="3" cols="30" name="bio"></textarea>
                                    </div>
                                </div><br>        
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Create Drug</button>
                            </div>
                        </form>
                    </div>
                </div>



@endsection