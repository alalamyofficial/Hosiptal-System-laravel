<?php

namespace App\Http\Controllers;

use App\DoctorSchedule;
use Illuminate\Http\Request;
use App\Department;
use App\Doctor;
use App\DashboardSettings;
use App\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $doctors = Doctor::all();
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();
        $schedules = DoctorSchedule::all();

        return view('admin.schedule.show',compact('doctors','dash_settings','schedules','departments','mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $doctors = Doctor::all();
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();
        $schedules = DoctorSchedule::all();


        return view('admin.schedule.create',compact('doctors','dash_settings','schedules','departments','mails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'doctor_id',
            'department_id', 
            'days_work',
            'holiday',
            'start_id',
            'end_id',
    

        ]);

        $schedules = new DoctorSchedule;

        $schedules->doctor_id = $request->doctor_id;    
        $schedules->department_id = $request->department_id;    
        $schedules->days_work = $request->days_work;    
        $schedules->holiday = $request->holiday;    
        $schedules->start_id = $request->start_id;    
        $schedules->end_id = $request->end_id;    


        $schedules->save();

        Alert::success('Success', 'Schedule Added Successfully !');


        return redirect()->route('schedule.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorSchedule $doctorSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorSchedule $doctorSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorSchedule $doctorSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorSchedule $doctorSchedule)
    {
        //
    }
}
