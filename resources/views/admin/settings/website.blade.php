@extends('admin.admin_layout')
@section('content')


<div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST" action="{{route('editWebsite.store')}}" enctype="multipart/form-data">
                        @csrf
                            <h4 class="page-title">Website Settings</h4>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Website Name</label>
                                <div class="col-lg-9">
                                    <input name="website_name" class="form-control" value="PreClinic" type="text" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Light Logo</label>
                                <div class="col-lg-7">
                                    <input class="form-control" type="file" name="website_image">
                                    <span class="form-text text-muted">Recommended image size is 40px x 40px</span>
                                </div>
                                <div class="col-lg-2">
                                    <div class="img-thumbnail float-right"><img src="{{asset('assets2/img/logo-dark.png')}}" alt="" width="40" height="40"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">

                                <textarea class="form-control w-100" name="about" id="message" cols="30" rows="9"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'About'"
                                    placeholder='About'></textarea>
                                </div>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>


@endsection