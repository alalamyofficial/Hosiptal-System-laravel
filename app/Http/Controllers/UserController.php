<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Doctor;
use App\Admin;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Service;
use App\Mail;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        $patients = Patient::all();
        $doctors = Doctor::all();
        $admins = Admin::all();
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        return view('admin.users.list',compact('users','patients','doctors','admins','dash_settings','mails'));

    }


}
