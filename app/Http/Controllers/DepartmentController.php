<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\DashboardSettings;
use App\WebsiteSettings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        return view('admin.department.show',compact('departments','dash_settings','mails'));
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

        return view('admin.department.create',compact('dash_settings','mails'));
        
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

            'name'=>'required'

        ]);

        $departments = new Department;

        $departments->name = $request->name;

        $departments->save();


        Alert::success('Success', 'Department Added Successfully !');

        return redirect()->route('department.show');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department,$id)
    {
        $department = Department::findOrFail($id);

        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        return view('admin.department.edit',compact('department','dash_settings','mails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department , $id)
    {
        $this->validate($request,[

            'name' => 'required|min:3'

        ]);

        $update_departments = [

            'name' => $request->name

        ];



        Department::whereId($id)->update($update_departments);
        
        Alert::success('Success', 'Department Updated Successfully !');


        return redirect()->route('department.show');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
