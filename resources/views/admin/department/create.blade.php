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

            <h4 class="page-title">Add Department</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('department.store')}}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name">
                        </div>
                    </div><br><br>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Short Biography</label>
                            <textarea style="height:400px" class="ckeditor form-control" rows="3" id="mytextarea" cols="60" name="description"></textarea>
                        </div>
                    </div>    
                    <br><br>
        
    
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Create Department</button>
                </div>
            </form>
        </div>
    </div>



@endsection