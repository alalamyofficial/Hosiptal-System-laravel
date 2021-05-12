<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\DashboardSettings;
use App\Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        return view('admin.employee.show',compact('employees','dash_settings','mails'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        return view('admin.employee.create',compact('dash_settings','mails'));
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

            'name' => "required",
            'email' => "required",
            'date_of_birth' => "required",
            'gender' => "required",
            'phone_number' => "required",
            'image' => "required",
            'country' => "required",
            'city' => "required",
            'age' => "required",
            'role' => "required",
            'bio' => "required",
    
        ]);

        $employees = new Employee;

        $employees->name = $request->name;
        $employees->email = $request->email;
        $employees->date_of_birth = $request->date_of_birth;
        $employees->phone_number = $request->phone_number;
        $employees->age = $request->age;
        $employees->role = $request->role;
        $employees->country = $request->country;
        $employees->city = $request->city;
        $employees->bio = $request->bio;
        $employees->gender = $request->gender;



        $img_file = $request->image;

        $new_image = time().$img_file->getClientOriginalName();

        $img_file->move('public/imgs/',$new_image);

        $employees->image = 'public/imgs/'.$new_image;



        $employees->save();

        Alert::success('Success', 'Employee Added Successfully !');


        return redirect()->route('employee.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
