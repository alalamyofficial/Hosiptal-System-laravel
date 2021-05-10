@extends('admin.admin_layout')
@section('content')

            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Inbox</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">


                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                            </button> -->

                            <div class="email-content">
								<div class="table-responsive">

                                    @if(count($mails) > 0) 
									<table class="table table-inbox table-hover" >
										<thead>
                                                <h4>Search Mails</h4>
                                                <input type="text" name="" id="search" class="form-control"><br><br>
										</thead>
										<tbody id="myTable">

                                        @foreach($mails as $mail)
                                            @csrf
                                                <tr class="unread clickable-row" data-href="mail-view.html">
                                                    <td>
                                                        <input type="checkbox" class="checkmail">
                                                    </td>

                                                        <td class="name">{{$mail->name}}</td>
                                                        <td class="subject">{{\Illuminate\Support\Str::limit(strip_tags($mail->message),40)}}</td>
                                                        <td class="mail-date">{{$mail->created_at->diffForHumans()}}</td>
                                                        <td>
                                                        
                                                            <a  href="{{route('admin.mails.contents', $mail->id)}}" class="btn btn-secondary btn-sm">View</a>

                                                    </td>

                                                </tr>

                                        @endforeach

                                        @else

                                            <p scope="row" class="text-center"><b>No Mails Found</b></p>



                                        @endif

										</tbody>
									</table>
								</div>
                            </div>
                        </div>
                    </div>
                </div>


                {!! $mails->links() !!}


@endsection