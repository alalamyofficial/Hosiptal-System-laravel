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
use App\User;
use Charts;
use RealRashid\SweetAlert\Facades\Alert;


if (!isset($_SESSION)) {
    session_start();
}
// session_start();

// session_status() === PHP_SESSION_ACTIVE ?: session_start();


class AdminController extends Controller
{




    public function adminLogin()
    {

        return view('admin.login');
    }

    public function dashboard()
    {

        if (Session::has('id')) {

            $patients = Patient::latest()->paginate(5);
            $doctors = Doctor::latest()->paginate(5);
            $dash_settings = DashboardSettings::all();
            $departments = Department::all();
            $appointments = Appointment::all();
            $mynookappointment = BookAppointment::all();
            $myreservation = BookAppointment::all();
            $services  = Service::all();
            $mails = Mail::all();
            $user = Auth::user();
            $mail_noty = Mail::find(1);

            //charts for patient
            $patients = Patient::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))
                ->get();
            $chart1 = Charts::database($patients, 'bar', 'highcharts')
                ->title("Monthly new Patients")
                ->elementLabel("Total Patients")
                ->dimensions(500, 500)
                ->responsive(false)
                ->groupByMonth(date('Y'), true);


            $appointments = Appointment::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))
                ->get();
            $chart2 = Charts::database($appointments, 'bar', 'highcharts')
                ->title("Monthly new Appointments")
                ->elementLabel("Total Appointments")
                ->dimensions(500, 500)
                ->responsive(false)
                ->groupByMonth(date('Y'), true);

            return view('admin.dashboard', compact('myreservation', 'chart1', 'chart2', 'mail_noty', 'patients', 'doctors', 'dash_settings', 'appointments', 'departments', 'mynookappointment', 'services', 'mails', 'user'));
        } else {

            return redirect('admin/login');
        }
    }

    public function Todashboard(Request $request)
    {


        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('admins')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();

        // dd($result);   

        if ($result) {

            Session::put('admin_name', $result->admin_name);
            Session::put('id', $result->id);

            return redirect()->route('admin.dashboard');
        } else {

            Session::put('message', 'Email and Password are not Valid');
            return redirect()->route('admin.login');
        }
    }

    public function pending_reservation()
    {

        $mails = Mail::all();
        $pending_reservations = BookAppointment::where('status', 0)->latest()->get();
        $doctors = Doctor::latest()->paginate(5);
        $dash_settings = DashboardSettings::all();
        return view('admin.reservations.pending', compact('pending_reservations', 'doctors', 'dash_settings', 'mails'));
    }

    public function reservation()
    {

        $mails = Mail::all();
        $myreservation = BookAppointment::where('status', 1)->latest()->get();
        $doctors = Doctor::latest()->paginate(5);
        $dash_settings = DashboardSettings::all();
        return view('admin.reservations.reservation', compact('myreservation', 'doctors', 'dash_settings', 'mails'));
    }

    public function approve_reservations(BookAppointment $bookAppointment, $id)
    {


        $mails = Mail::all();
        $pending_reservations = BookAppointment::all();
        $doctors = Doctor::latest()->paginate(5);
        $dash_settings = DashboardSettings::all();

        $data = BookAppointment::findOrFail($id);

        if ($data->status == 0) {

            $data->status = 1;
        } else {

            $data->status = 0;
        }


        $data->save();

        Alert::success('Success', 'Request Confirmed Successfully !');

        return redirect()->route('admin.reservation', compact('pending_reservations', 'mails', 'dash_settings'))->with('Message', $data->user_id, 'Status has been changed Successfully');
    }

    public function logout()
    {

        Session::flush();

        return redirect('admin/login');
    }
}
