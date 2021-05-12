<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Doctor;
use App\Department;
use App\Patient;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$departments = Department::all();
        $dash_settings = DashboardSettings::all();
        $patients = Patient::all();
        $doctors = Doctor::all();
		$appointments = Appointment::all();
		$mails = Mail::all();


    	return view('admin.appointment.show',compact('departments','dash_settings','patients','doctors','appointments','mails'));

    }

    public function create(Request $request)
    {
		$departments = Department::all();
        $dash_settings = DashboardSettings::all();
        $patients = Patient::all();
        $doctors = Doctor::all();
		$mails = Mail::all();

    	return view('admin.appointment.create',compact('departments','dash_settings','patients','doctors','mails'));
    }

	public function store(Request $request){

		$this->validate($request,[


			'patient_id'=>'required',
			'doctor_id'=>'required',
			'department_id'=>'required',
			'start' => 'required',
			'end' => 'required',
			'patient_email' => 'required',
			'patient_phone' => 'required',
			'message' => 'required',
			'age' => 'required',
			'date' => 'required',

		]);

		$appointments = new Appointment;

		$appointments->patient_id = $request->patient_id;
		$appointments->doctor_id = $request->doctor_id;
		$appointments->department_id = $request->department_id;
		$appointments->start = $request->start;
		$appointments->end = $request->end;
		$appointments->patient_email = $request->patient_email;
		$appointments->patient_phone = $request->patient_phone;
		$appointments->message = $request->message;
		$appointments->age = $request->age;
		$appointments->date = $request->date;

		$appointments->save();

		Alert::success('Success', 'Appointment Added Successfully !');

		
		return redirect()->back();

	}

}
