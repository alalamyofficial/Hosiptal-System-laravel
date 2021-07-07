@extends('admin.admin_layout')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Drugs</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="{{route('drug.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Drug</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                @if(count($drugs) > 0)
                    <table class="table table-border table-striped custom-table datatable mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Description</th>

                                <th>Created</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($drugs as $drug)
                                    <tr>

                                        <td>{{$drug->name}}</td>
                                        <td><img src="{{asset($drug->image)}}" alt="" width="100px"></td>
                                        <td>{{$drug->category}}</td>
                                        <td>{{$drug->bio}}</td>

                                        <td>{{$drug->created_at->diffForHumans()}}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <form action="{{route('drug.delete',$drug->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                        <a class="dropdown-item" style="width:200px; padding-left:76px;" href="{{route('drug.edit',$drug->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                                        <button style="border:none; width:200px">

                                                            <i class="fa fa-trash-o m-r-5"></i> Delete

                                                        </button>

                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                        </tbody>
                    </table>
                    @else

                        <p scope="row" class="text-center"><b>No Drugs Found</b></p>

                    @endif          
                </div>
            </div>
        </div>    

@endsection