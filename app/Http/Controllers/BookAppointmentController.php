<?php

namespace App\Http\Controllers;

use App\BookAppointment;
use Illuminate\Http\Request;
use App\Appointment;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Doctor;
use App\Department;
use App\Patient;
use Auth;
use App\Notifications\ReservationNotification;
use Notification;
use Illuminate\Notifications\Notifiable;
use App\Mail;
use App\User;



class BookAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $departments = Department::all();
        $doctors = Doctor::all();
        $myreservation = BookAppointment::where('user_id', $userId)->latest()->get();
        $mails = Mail::all();

        return view('user.reservation',compact('doctors','myreservation','mails'));

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
        $mails = Mail::all();

        return view('user.book_appointment',compact('departments','doctors','mails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mynookappointment = BookAppointment::all();

        $user = User::all();

        $this->validate($request,[

            'name' => 'required',
            'gender' => 'required',
            'area_code' => 'required',
            'phone_number' => 'required',
            'date_of_birth' => 'required',
            'patient_address' => 'required', 
            'country' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'email' => 'required',
            'doctor_id' => 'required',


        ]);

          $mynookappointment = new BookAppointment; 
          
          $mynookappointment->name = $request->name;
          $mynookappointment->gender = $request->gender;
          $mynookappointment->area_code = $request->area_code;
          $mynookappointment->phone_number = $request->phone_number;
          $mynookappointment->date_of_birth = $request->date_of_birth;
          $mynookappointment->patient_address = $request->patient_address;
          $mynookappointment->country = $request->country;
          $mynookappointment->city = $request->city;
          $mynookappointment->zip_code = $request->zip_code;
          $mynookappointment->email = $request->email;
          $mynookappointment->doctor_id = $request->doctor_id;
          $mynookappointment->user_id =  Auth::user()->id; 

          $mynookappointment->status = false;


          Notification::send($user , new ReservationNotification($request->name));

          toast('Your Booking has been submited!','success');


          $mynookappointment->save();

          return redirect()->route('home');
          


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookAppointment  $bookAppointment
     * @return \Illuminate\Http\Response
     */
    public function show(BookAppointment $bookAppointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookAppointment  $bookAppointment
     * @return \Illuminate\Http\Response
     */
    public function edit(BookAppointment $bookAppointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookAppointment  $bookAppointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookAppointment $bookAppointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookAppointment  $bookAppointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookAppointment $bookAppointment,$id)
    {
        $my = BookAppointment::findOrFail($id);

        $my->destroy($id);

        toast('Your Booking has been deleted!','success');


        return view('user.reservation')->with($my,'my');

    }

    public function covid(){

        return view('user.covid');

    }

    public function doctors(){

        $doctors = Doctor::all();
        return view('user.doctors',compact('doctors'));

    }

}
