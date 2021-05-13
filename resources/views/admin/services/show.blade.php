@extends('admin.admin_layout')
@section('content')

<div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Services</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="{{route('service.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Service</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-border table-striped custom-table datatable mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Description</th>

                                <th>Created</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($services as $service)
                            <tr>

                                <td>{{$service->title}}</td>
                                <td><i class="<?php echo $service->icon;?>"></i></td>
                                <td>{{$service->description}}</td>

                                <td>{{$service->created_at->diffForHumans()}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="" method="post">
                                            @csrf
                                            @method('patch')
                                                <a class="dropdown-item" href="{{route('service.edit',$service->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>    

@endsection