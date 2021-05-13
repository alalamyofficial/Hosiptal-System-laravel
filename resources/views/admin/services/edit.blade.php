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

                        <h4 class="page-title">Edit Service</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{route('service.update',$service->id)}}" method="POST">
                        @csrf
                        @method('patch')

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Icon <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="icon" placeholder="fa fa-user" value="{{$service->icon}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="title" value="{{$service->title}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Short Biography</label>
                                        <textarea class="form-control" rows="3" cols="30" name="description">value="{{$service->description}}</textarea>
                                    </div>
                                </div><br>        
                            <div class="m-t-20 text-center">
                                <button class="btn btn-success submit-btn">Edit Service</button>
                            </div>
                        </form>
                    </div>
                </div>



@endsection