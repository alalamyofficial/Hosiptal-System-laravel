<?php

namespace App\Http\Controllers;

use App\Nurse;
use Illuminate\Http\Request;
use App\DashboardSettings;
use App\Department;
use RealRashid\SweetAlert\Facades\Alert;


class NurseController extends Controller
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
        $nurses = Nurse::all();
        return view('admin.nurse.show',compact('departments','dash_settings','nurses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $dash_settings = DashboardSettings::all();
        return view('admin.nurse.create',compact('departments','dash_settings'));
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

        $nurses = new Nurse;

        $nurses->first_name = $request->first_name;
        $nurses->last_name = $request->last_name;
        $nurses->email = $request->email;
        $nurses->date_of_birth = $request->date_of_birth;
        $nurses->gender = $request->gender;
        $nurses->phone_number = $request->phone_number;
        $nurses->country = $request->country;
        $nurses->city = $request->city;
        $nurses->age = $request->age;
        $nurses->bio = $request->bio;
        $nurses->start = $request->start;
        $nurses->end = $request->end;
        $nurses->department_id = $request->department_id;

        // $doctors->cv = $request->cv;

        // if($request->file('image')){

            $img_file = $request->image;

            $new_image = time().$img_file->getClientOriginalName();

            $img_file->move('public/imgs/',$new_image);

            $nurses->image = 'public/imgs/'.$new_image;

        // }


        if($request->file('cv')){
            $pdf_file = $request->file('cv');
            $pdf_file->storeAs('public/pdfs/','cv.' . $pdf_file->getClientOriginalExtension());
            $nurses->cv = 'storage/pdfs/cv.' . $pdf_file->getClientOriginalExtension();
        }

        $nurses->save();

        Alert::success('Success', 'Nurse Added Successfully !');


        return redirect()->route('nurse.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function show(Nurse $nurse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function edit(Nurse $nurse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nurse $nurse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurse $nurse)
    {
        //
    }
}
