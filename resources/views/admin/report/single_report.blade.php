@extends('admin.admin_layout')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Report View</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="blog-view">
                <article class="blog blog-single-post">
                    @foreach($reports as $report)
                    <h3 class="blog-title">{{$report->title}}</h3>
                    <div class="blog-info clearfix">
                        <div class="post-left">
                            <ul>
                                <li><a href="#."><i class="fa fa-calendar"></i> <span>{{$report->created_at->diffForHumans()}}</span></a></li>
                                <li><a href="#."><i class="fa fa-file"></i> <span>
                                @if($report->type == '1')
                                    Normal Report
                                @elseif($report->type == '0')
                                    Death Report

                                @endif     
                                </span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-image">
                        <a href="#."><img alt="" src="{{asset($report->image)}}" class="img-fluid"></a>
                    </div>
                    <div class="blog-content">
                        <p>{!!$report->bio!!}</p>
                    </div>
                    @endforeach
                </article>

            </div>
        </div>
    </div>
</div>


@endsection