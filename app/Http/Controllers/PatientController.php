<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\DashboardSettings;
use App\WebsiteSettings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = Mail::all();

        $patients = Patient::all();

        $dash_settings = DashboardSettings::all();

        return view('admin.patient.show',compact('patients','dash_settings','mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mails = Mail::all();

        $dash_settings = DashboardSettings::all();

        return view('admin.patient.create',compact('dash_settings','mails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [

            'name' => 'required|string',
            'email' => 'required|string',
            'phone_number' => 'required|numeric',
            'age' => 'required|numeric',
            'disease_type' => 'required|string',
            'gender' => 'required|boolean', 

        ]);

        $patients = new Patient; 

        $patients->name = $request->name;
        $patients->email = $request->email;
        $patients->phone_number = $request->phone_number;
        $patients->disease_type = $request->disease_type;
        $patients->gender = $request->gender;
        $patients->age = $request->age;


        $patients->save();

        Alert::success('Patient', 'Patient Added Successfully !');

        return redirect()->route('patient.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient ,$id)
    {
        $mails = Mail::all();

        $patient = Patient::findOrFail($id);

        $dash_settings = DashboardSettings::all();

        return view('admin.patient.edit',compact('patient','dash_settings','mails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient,$id)
    {
        $this->validate($request, [

            'name' => 'required|string',
            'email' => 'required|string',
            'phone_number' => 'required|numeric',
            'age' => 'required|numeric',
            'disease_type' => 'required|string',
            'gender' => 'required|boolean', 

        ]);

        $update_patient = [

            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "disease_type" => $request->disease_type,
            "gender" => $request->gender,
            "age" => $request->age,

        ];

        Patient::whereId($id)->update($update_patient);

        // $patient->save();

        Alert::success('Success', 'Patient Updated Successfully !');


        return redirect()->route('patient.show');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient,$id)
    {
        $patient = Patient::findOrFail($id);

        $patient->destroy();


        Alert::error('Success', 'Patient Deleted Successfully !');


        return redirect()->route('patient.show');
    }
}
