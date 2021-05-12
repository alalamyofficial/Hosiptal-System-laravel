<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Department;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail;

class DoctorController extends Controller
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

        return view('admin.doctor.show',compact('doctors','dash_settings','departments','mails'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mails = Mail::all();

        $departments = Department::all();
        $dash_settings = DashboardSettings::all();
        return view('admin.doctor.create',compact('dash_settings','departments','mails'));

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
            
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string' ,
            'date_of_birth' => 'required|date',
            'gender' => 'required|boolean' ,
            'phone_number' => 'required|numeric',
            'image' => 'required',
            'country' => 'required',
            'city' => 'required',
            'age' => 'required',
            'cv' => 'required' ,
            'bio' => 'required',
            'start' => 'required',
            'end' => 'required',
            'department_id' => 'required',


        ]);

        $doctors = new Doctor;

        $doctors->first_name = $request->first_name;
        $doctors->last_name = $request->last_name;
        $doctors->email = $request->email;
        $doctors->date_of_birth = $request->date_of_birth;
        $doctors->gender = $request->gender;
        $doctors->phone_number = $request->phone_number;
        $doctors->country = $request->country;
        $doctors->city = $request->city;
        $doctors->age = $request->age;
        $doctors->bio = $request->bio;
        $doctors->start = $request->start;
        $doctors->end = $request->end;
        $doctors->department_id = $request->department_id;

        // $doctors->cv = $request->cv;

        // if($request->file('image')){

            $img_file = $request->image;

            $new_image = time().$img_file->getClientOriginalName();

            $img_file->move('public/imgs/',$new_image);

            $doctors->image = 'public/imgs/'.$new_image;

        // }


        if($request->file('cv')){
            $pdf_file = $request->file('cv');
            $pdf_file->storeAs('public/pdfs/','cv.' . $pdf_file->getClientOriginalExtension());
            $doctors->cv = 'storage/pdfs/cv.' . $pdf_file->getClientOriginalExtension();
        }

        $doctors->save();

        Alert::success('Success', 'Doctor Added Successfully !');


        return redirect()->route('doctor.show');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
