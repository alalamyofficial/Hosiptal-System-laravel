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
use App\Department;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = Mail::all();

        $dash_settings = DashboardSettings::all();

        $operations = Operation::all();

        return view('admin.operation.show',compact('dash_settings','mails','operations'));

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

        $doctors = Doctor::all();

        $nurses = Nurse::all();

        $patients = Patient::all();

        $departments = Department::all();

        return view('admin.operation.create',compact('dash_settings','mails','departments','doctors','nurses','patients'));
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

            'doctor' => 'required',
            'nurse' => 'required',
            'patient' => 'required',
            'department_id' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'price' => 'required',
            'start' => 'required',
            'end' => 'required',


        ]);

        $operations = new Operation;
        
        $operations->doctor = $request->doctor;
        $operations->nurse = $request->nurse;
        $operations->patient = $request->patient;
        $operations->department_id = $request->department_id;
        $operations->operation_type = $request->operation_type;
        $operations->country = $request->country;
        $operations->city = $request->city;
        $operations->address = $request->address;
        $operations->price = $request->price;
        $operations->start = $request->start;
        $operations->end = $request->end;



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
    public function edit(Operation $operation, $id)
    {

        $operation = Operation::findOrFail($id);    
        
        $mails = Mail::all();

        $dash_settings = DashboardSettings::all();

        $departments = Department::all();

        return view('admin.operation.edit',compact('dash_settings','mails','departments','operation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation, $id)
    {
        // $operation = Operation::findOrFail($id);    

        $this->validate($request,[

            'doctor' => 'required',
            'nurse' => 'required',
            'patient' => 'required',
            'department_id' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'price' => 'required',
            'start' => 'required',
            'end' => 'required',


        ]);

        $update_operation = [

            'doctor' => $request->doctor,
            'nurse' => $request->nurse,
            'patient' => $request->patient,
            'department_id' => $request->department_id,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'price' => $request->price,
            'start' => $request->start,
            'end' => $request->end

        ];

        Operation::whereId($id)->update($update_operation);


        Alert::success('Success', 'Operation Updated Successfully !');


        return redirect()->route('operation.show');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation, $id)
    {
        $operation = Operation::findOrFail($id);    

        $operation->destroy($id);    

        Alert::error('Success', 'Operation Deleted Successfully !');


        return redirect()->route('operation.show');

    }
}
