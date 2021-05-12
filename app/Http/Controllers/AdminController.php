<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Patient;
use App\Doctor;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Department;
use App\Appointment;
use App\BookAppointment;
use App\Service;
use Auth;
use App\Mail;

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
// session_start();

// session_status() === PHP_SESSION_ACTIVE ?: session_start();


class AdminController extends Controller
{


    
    public function adminLogin(){

        return view('admin.login');

    }

    public function dashboard(){

        if(Session::has('id')){


            $patients = Patient::latest()->paginate(5);
            $doctors = Doctor::latest()->paginate(5);
            $dash_settings = DashboardSettings::all();
            $departments = Department::all();
            $appointments = Appointment::all();
            $mynookappointment = BookAppointment::all();
            $myreservation = BookAppointment::all();
            $services  = Service::all();
            $mails = Mail::all();
    
    
            return view('admin.dashboard',compact('myreservation','patients','doctors','dash_settings','appointments','departments','mynookappointment','services','mails'));
        
        }else{

            return redirect('admin/login');


        }


    }

    public function Todashboard(Request $request){


        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('admins')
                    ->where('admin_email',$admin_email)
                    ->where('admin_password',$admin_password)
                    ->first();

        // dd($result);   
        
        if($result){

            Session::put('admin_name' ,$result->admin_name);
            Session::put('id' ,$result->id);

            return redirect()->route('admin.dashboard');


        }
        else{

            Session::put('message','Email and Password are not Valid');
            return redirect()->route('admin.login');
        }

		// if (auth()->guard()->attempt(['admin_email' => request('admin_email'), 'admin_password' => request('admin_password')])) {
		// 	return redirect('admin');
		// } else {
		// 	session()->flash('error');
		// 	return redirect('admin/login');
		// }

    }

    public function reservation(){

        $mails = Mail::all();
        $myreservation = BookAppointment::all();
        $doctors = Doctor::latest()->paginate(5);
        $dash_settings = DashboardSettings::all();
        return view('admin.reservation',compact('myreservation','doctors','dash_settings','mails'));


    }

    public function logout() {

		// auth()->guard('admin')->logout();
		// return redirect('admin/login');

        // Session::put('admin_name',null);
        // Session::put('id',null);

        Session::flush();

        return redirect('admin/login');
	}

}
