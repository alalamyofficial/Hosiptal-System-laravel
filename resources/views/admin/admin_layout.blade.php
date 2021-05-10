<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets2/img/favicon.ico')}}">
    <title>Preclinic - Medical & Hospital</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css" integrity="sha512-apX8rFN/KxJW8rniQbkvzrshQ3KvyEH+4szT3Sno5svdr6E/CP0QE862yEeLBMUnCqLko8QaugGkzvWS7uNfFQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css" integrity="sha512-Nqct4Jg8iYwFRs/C34hjAF5og5HONE2mrrUV1JZUswB+YU7vYSPyIjGMq+EAQYDmOsMuO9VIhKpRUa7GjRKVlg==" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" integrity="sha512-jQqzj2vHVxA/yCojT8pVZjKGOe9UmoYvnOuM/2sQ110vxiajBU+4WkyRs1ODMmd4AfntwUEV4J+VfM6DkfjLRg==" crossorigin="anonymous" /> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    
    <!-- @notifyCss -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script> -->


    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index-2.html" class="logo">
                @foreach($dash_settings as $settings)
					<img src="{{url($settings->dash_image)}}" width="35" height="35" alt=""> <span>{{$settings->dash_name}}</span>
				@endforeach
                </a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">
												<img alt="John Doe" src="{{asset('assets2/img/user.jpg')}}" class="img-fluid">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{{asset('assets2/img/user.jpg')}}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>{{Session::get('admin_name')}}</span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
						<!-- <a class="dropdown-item" href="login.html">Logout</a> -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="dropdown-item">
                            @csrf
                        </form>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						<li>
                            <a><i class="fa fa-user-md"></i> <span>Doctors</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            <li><a href="{{route('doctor.create')}}">Add Doctor</a></li>
								<li><a href="{{route('doctor.show')}}">Doctors</a></li>
							</ul>
                        </li>
                        <li>
                            <a><i class="fa fa-female"></i> <span>Nurses</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                            <li><a href="{{route('nurse.create')}}">Add Nusre</a></li>
								<li><a href="{{route('nurse.show')}}">Nurses</a></li>
							</ul>
                        </li>
                        <li>
                            <a><i class="fa fa-wheelchair"></i> <span>Patients</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
								<li><a href="{{route('patient.create')}}">Add Patient</a></li>
								<li><a href="{{route('patient.show')}}">Patient</a></li>

							</ul>
                        </li>
                        <li>
                            <a><i class="fa fa-users"></i> <span>Employees</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
								<li><a href="{{route('employee.create')}}">Add Employee</a></li>
								<li><a href="{{route('employee.show')}}">Employees</a></li>

							</ul>
                        </li>
                        <li>
                            <a><i class="fa fa-calendar"></i> <span>Appointments</span><span class="menu-arrow"></span></a>

                            <ul style="display: none;">
								<li><a href="{{route('appointment.create')}}">Add Appointment</a></li>
								<li><a href="{{route('appointment.show')}}">Appointments</a></li>

							</ul>                        
                        </li>
                        <li>
                            <a><i class="fa fa-hospital-o"></i> <span>Departments</span> <span class="menu-arrow"></span> </a>
                            <ul style="display: none;">
								<li><a href="{{route('department.create')}}">Add Department</a></li>
								<li><a href="{{route('department.show')}}">Departments</a></li>

							</ul>
                        </li>

                        <li>
                            <a href="{{route('admin.reservation')}}"><i class="fa fa-ticket"></i> <span>Reservations</span> </a>
                        </li>

                        <li>
                            <a href="{{route('ambulance.show')}}"><i class="fa fa-ambulance"></i> <span>Ambulance</span> </a>
                        </li>

						<li class="submenu">
							<a href=""><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="salary.html"> Employee Salary </a></li>
								<li><a href="salary-view.html"> Payslip </a></li>
							</ul>
						</li>

						<li class="submenu">
							<a href=""><i class="fa fa-user"></i> <span> Users </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{route('users.list')}}">Users List</a></li>
								<li><a href="holidays.html">Holidays</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href=""><i class="fa fa-tasks"></i> <span> Services </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                                <li><a href="{{route('service.create')}}">Add Service</a></li>
								<li><a href="{{route('service.show')}}">Services</a></li>
							</ul>
						</li>


                        <li>
                            <a href="{{route('admin.mails')}}"><i class="fa fa-envelope-square"></i> <span>Mails</span> <span class="badge badge-pill bg-primary float-right">{{count($mails)}}</span></a>
                        </li>

                        <li>
                            <a href="chat.html"><i class="fa fa-code"></i> <span>Embadded</span></a>
                        </li>


                        <li>
                            <a><i class="fa fa-cog"></i> <span>Settings</span><span class="menu-arrow"></span></a>
                            <ul style="display: none;">
								<li><a href="{{route('dashboard.settings')}}">Dashboard Settings</a></li>
								<li><a href="{{route('website.settings')}}">Website Settings</a></li>

							</ul>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">


            @yield('content')

            @include('sweetalert::alert')


            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item new-message">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <span class="message-time">1 Aug</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">D</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Domenic Houston </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">B</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Buster Wigton </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Rolland Webber </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Claire Mapes </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Melita Faucher</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jeffery Lalor</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Loren Gatlin</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Tarah Shropshire</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.html">See all messages</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script>

        $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });

    </script>

    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{asset('assets2/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets2/js/popper.min.js')}}"></script>
    <script src="{{asset('assets2/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets2/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets2/js/Chart.bundle.js')}}"></script>
    <script src="{{asset('assets2/js/chart.js')}}"></script>
    <script src="{{asset('assets2/js/app.js')}}"></script>
    <script src="{{asset('assets2/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets2/js/select2.min.js')}}"></script>
	<script src="{{asset('assets2/js/moment.min.js')}}"></script>

    <!-- @include('notify::messages')

    @notifyJs -->
    <!-- <x:notify-messages /> -->


</body>



</html>