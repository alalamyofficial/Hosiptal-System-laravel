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
            'start' => "required",
            'end' => "required",
    
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
        $employees->start = $request->start;
        $employees->end = $request->end;



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
    public function edit(Employee $employee , $id)
    {
        $employee = Employee::findOrFail($id);
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        return view('admin.employee.edit',compact('employee','dash_settings','mails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee ,$id)
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
            'start' => "required",
            'end' => "required",
    
        ]);

        $employee = Employee::findOrFail($id);

        if ($request->has('image')){


            $img_file = $request->image;
    
            $new_image = time().$img_file->getClientOriginalName();
    
            $img_file->move('public/imgs/',$new_image);

            $employee->image = 'public/imgs/'.$new_image;

            $update_employees = [
    
                "name" => $request->name,
                "email" => $request->email,
                "date_of_birth" => $request->date_of_birth,
                "phone_number" => $request->phone_number,
                "age" => $request->age,
                "role" => $request->role,
                "country" => $request->country,
                'city' => $request->city,
                "bio" => $request->bio,
                "gender" => $request->gender,
                "start" => $request->start,
                "end" => $request->end,
                "image" => 'public/imgs/'.$new_image,
            ];

        }else{

            $update_employees = [
    
                "name" => $request->name,
                "email" => $request->email,
                "date_of_birth" => $request->date_of_birth,
                "phone_number" => $request->phone_number,
                "age" => $request->age,
                "role" => $request->role,
                "country" => $request->country,
                'city' => $request->city,
                "bio" => $request->bio,
                "gender" => $request->gender,
                "start" => $request->start,
                "end" => $request->end,
            ];

        }

        $employee->update($update_employees);


        $employee->save();

        Alert::success('Success', 'Employee Updated Successfully !');


        return redirect()->route('employee.show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee,$id)
    {
        $employee = Employee::findOrFail($id);

        $employee->destroy($id);

        Alert::error('Success', 'Employee Deleted Successfully !');


        return redirect()->route('employee.show');

    }
}
