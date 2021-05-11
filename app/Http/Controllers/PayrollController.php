<?php

namespace App\Http\Controllers;

use App\Payroll;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Mail;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        return view('admin.payroll.show',compact('dash_settings','mails'));
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

        return view('admin.payroll.create',compact('dash_settings','mails'));
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

            'salary' =>'required',
            'name' =>'required',
            'role' =>'required',

        ]);

        $payrolls = new Payroll; 

        $payrolls->name = $request->name;
        $payrolls->role = $request->role;
        $payrolls->salary = $request->salary;

        $payrolls->save();

        Alert::success('Success', 'Payroll Added Successfully !');


        return redirect()->route('payroll.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll)
    {
        //
    }
}
