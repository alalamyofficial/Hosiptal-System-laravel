@extends('admin.admin_layout')
@section('content')



            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif

                        <h4 class="page-title">Users</h4>
                    </div>

                </div><br><br>

                <h5>Admins</h5>  

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>

                                        <th style="min-width:200px;">Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>
                                            <h2>{{$admin->admin_name}}</h2>
                                        </td>
                                        <td>{{$admin->admin_email}}</td>
                                        <td>{{$admin->admin_phone}}</td>
                                        <td>
                                            <span class="custom-badge status-green">Admins</span>
                                        </td>
                                    </tr>
                                    @endforeach    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>  <br>

                <h5>Users</h5>  

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>

                                        <th style="min-width:200px;">Name</th>
                                        <th>Email</th>
                                        <th style="min-width: 110px;">Join Date</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <h2>{{$user->name}}</h2>
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>
                                            <span class="custom-badge status-orange">Users</span>
                                        </td>
                                    </tr>
                                    @endforeach    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>  <br>




@endsection