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

                        <h4 class="page-title">Edit Department</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{route('department.update' , $department->id)}}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="{{$department->name}}">
                                    </div>
                                </div><br><br>
                
                            <div class="m-t-20 text-center">
                                <button class="btn btn-success submit-btn">Update Department</button>
                            </div>
                        </form>
                    </div>
                </div>



@endsection