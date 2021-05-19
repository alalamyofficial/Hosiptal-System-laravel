<?php

namespace App\Http\Controllers;

use App\Operation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\DashboardSettings;
use App\Mail;
use App\Doctor;
use App\Nurse;
use App\Patient;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mails = Mail::all();

        // $departments = Department::all();
        $dash_settings = DashboardSettings::all();

        $doctors = Doctor::all();

        $nurses = Nurse::all();

        $patients = Patient::all();

        return view('admin.operation.create',compact('dash_settings','mails','doctors','nurses','patients'));
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

            // 'doctor_id' => 'required',
            // 'nurse_id' => 'required',
            // 'patient_id' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'price' => 'required',
            'start' => 'required',
            'end' => 'required',


        ]);

        $operations = new Operation;
        
        // $operations->doctor_id = $request->doctor_id;
        // $operations->nurse_id = $request->nurse_id;
        // $operations->patient_id = $request->patient_id;
        $operations->country = $request->country;
        $operations->city = $request->city;
        $operations->address = $request->address;
        $operations->price = $request->price;
        $operations->start = $request->start;
        $operations->end = $request->end;

        $operations->doctors()->attach($request->input('doctors'));
        $operations->nurses()->attach($request->nurses);
        $operations->patients()->attach($request->patients);

        $operations->save();

        Alert::success('Success', 'Operation Added Successfully !');


        return redirect()->route('operation.show');

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        //
    }
}
