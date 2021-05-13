<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\DashboardSettings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails  = Mail::all();

        $services  = Service::all();
        $dash_settings = DashboardSettings::all();

        return view('admin.services.show',compact('services','dash_settings','mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mails  = Mail::all();

        $dash_settings = DashboardSettings::all();

        return view('admin.services.create',compact('dash_settings','mails'));
    }

    public function user_services(){

        $services = Service::all();

        return view('services',compact('services'));

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


            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',


        ]);

        $services = new Service;

        $services->title = $request->title;
        $services->icon = $request->icon;
        $services->description = $request->description;

        $services->save();

        Alert::success('Success', 'Service Added Successfully !');


        return redirect()->route('service.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service,$id)
    {
        $mails  = Mail::all();

        $dash_settings = DashboardSettings::all();

        $service = Service::findOrFail($id);

        return view('admin.services.edit',compact('dash_settings','mails','service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service , $id)
    {
        $this->validate($request,[


            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',


        ]);

        $update_services = [

            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,

        ];

        Service::whereId($id)->update($update_services);
        
        Alert::success('Success', 'Service Updated Successfully !');


        return redirect()->route('service.show');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
