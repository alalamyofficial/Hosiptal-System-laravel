@extends('admin.admin_layout')
@section('content')


<div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST" action="{{route('editdashboard.store')}}" enctype="multipart/form-data">
                        @csrf
                            <h4 class="page-title">Dashboard Settings</h4>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Website Name</label>
                                <div class="col-lg-9">
                                    <input name="dash_name" class="form-control" value="PreClinic" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Light Logo</label>
                                <div class="col-lg-7">
                                    <input class="form-control" type="file" name="dash_image">
                                    <span class="form-text text-muted">Recommended image size is 40px x 40px</span>
                                </div>
                                <div class="col-lg-2">
                                    <div class="img-thumbnail float-right"><img src="{{asset('assets2/img/logo-dark.png')}}" alt="" width="40" height="40"></div>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Favicon</label>
                                <div class="col-lg-7">
                                    <input class="form-control" type="file">
                                    <span class="form-text text-muted">Recommended image size is 16px x 16px</span>
                                </div>
                                <div class="col-lg-2">
                                    <div class="settings-image img-thumbnail float-right"><img src="{{asset('assets2/img/favicon.ico')}}" class="img-fluid" width="16" height="16" alt=""></div>
                                </div>
                            </div> -->
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>


@endsection