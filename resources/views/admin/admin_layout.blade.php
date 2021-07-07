<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{asset('assets/img/favicon.png')}}">
    <title>Preclinic - Medical & Hospital</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/tagsinput.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css" integrity="sha512-apX8rFN/KxJW8rniQbkvzrshQ3KvyEH+4szT3Sno5svdr6E/CP0QE862yEeLBMUnCqLko8QaugGkzvWS7uNfFQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css" integrity="sha512-Nqct4Jg8iYwFRs/C34hjAF5og5HONE2mrrUV1JZUswB+YU7vYSPyIjGMq+EAQYDmOsMuO9VIhKpRUa7GjRKVlg==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>


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
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    
                    <i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">1
                    
                    </span>
                    </a>

                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">


                                <a href="">
                                    <div class="media">
                                        
                                        <span class="avatar">
                                            <img alt="John Doe" src="{{asset('assets2/img/user.jpg')}}" class="img-fluid">
                                        </span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title"></span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                            <p class="noti-time"><span class="notification-time"></span></p>
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
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link">
                     
                    <i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">1
                    
                    
                    </span>
                    </a>
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
                            <a><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span><span class="menu-arrow"></span></a>
                            
                            <ul style="display: none;">
                                <li><a href="{{route('schedule.create')}}">Add Doctor Schedule</a></li>
								<li><a href="{{route('schedule.show')}}">Doctors Schedule</a></li>
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
                            <a><i class="fa fa-ticket"></i> <span>Reservations</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
								<li><a href="{{route('admin.reservation.pending')}}"> Pending Reservations </a></li>
								<li><a href="{{route('admin.reservation')}}"> All Reservations </a></li>
							</ul>
                        </li>

                        <li>
                            <a href="{{route('ambulance.show')}}"><i class="fa fa-ambulance"></i> <span>Ambulance</span> </a>
                        </li>

						<li class="submenu">
							<a href=""><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{route('payroll.create')}}"> Add Employee Salary </a></li>
								<li><a href="{{route('payroll.show')}}"> Employee Salary </a></li>
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
						<li class="submenu">
							<a href=""><i class="fa fa-medkit"></i> <span> Drugs </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                                <li><a href="{{route('drug.create')}}">Add Drug</a></li>
								<li><a href="{{route('drug.show')}}">Drugs</a></li>
							</ul>
						</li>
                        
                        <li>
                            <a><i class="fa fa-shield"></i> <span>Vaccine</span> <span class="menu-arrow"></span> </a>
                            <ul style="display: none;">
                                <li><a href="{{route('vaccine.pending')}}">Pending Vaccines</a></li>
								<li><a href="{{route('vaccine.show')}}">Vaccines</a></li>
							</ul>
                        </li>

                        <li>
                            <a><i class="fa fa-bed"></i> <span>Bed</span> <span class="menu-arrow"></span> </a>
                            <ul style="display: none;">
                                <li><a href="{{route('bed.pending')}}">Pending Beds</a></li>
								<li><a href="{{route('bed.show')}}">Beds</a></li>
							</ul>
                        </li>

                        <li>
                            <a><i class="far fa-heart"></i></i> <span>Operations</span><span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('operation.create')}}">Add Operation</a></li>
								<li><a href="{{route('operation.show')}}">Operations</a></li>
							</ul>
                        </li>
                        
                        <li class="submenu">
                            <a><i class="fa fa-commenting-o"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('blog.create')}}">Add Blog</a></li>
                                <li><a href="{{route('blog.show')}}">Blog</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('admin.mails')}}"><i class="fa fa-envelope-square"></i> <span>Mails</span> <span class="badge badge-pill bg-primary float-right">{{count($mails)}}</span></a>
                        </li>

                        <li class="submenu">
							<a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('report.create')}}">Add Report</a></li>
                                <li><a href="{{route('report.show')}}">Report</a></li>
                            </ul>
						</li>

                        <li>
                            <a href="{{route('admin.visitor')}}"><i class="far fa-user-circle"></i> <span>Who Visit me</span></a>
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
                        <span>Mails</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">


                        <?php   

                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "health_care";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT id, notifiable_type ,created_at FROM notifications";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                            
                                    echo"
                                    <li>
                                        <a href='chat.html'>
                                            <div class='list-item'>
                                                <div class='list-left'>
                                                    <span class='avatar'>E</span>
                                                </div>
                                                <div class='list-body'>
                                                    <span class='message-author'></span>
                                                    <span class='message-time'>$row[created_at]</span>
                                                    <div class='clearfix'></div>
                                                    <span class='message-content'></span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    ";
                                
                                
                                        
                            }

                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                                                                                



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
    <script src="{{asset('assets2/js/tagsinput.js')}}"></script>



</body>



</html>