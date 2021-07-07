<?php

namespace App\Http\Controllers;

use App\Ambulance;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\DashboardSettings;
use App\Mail;
use App\User;
use Auth;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.ambulance.ambulance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::all();

        $this->validate($request,[

            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'city' => 'required',
            'age' => 'required',
            'gender' => 'required',


        ]);

        $ambulances = new Ambulance;

        $ambulances->name = $request->name;    
        $ambulances->email = $request->email;    
        $ambulances->phone_number = $request->phone_number;    
        $ambulances->country = $request->country;    
        $ambulances->city = $request->city;    
        $ambulances->gender = $request->gender;  
        $ambulances->age = $request->age;  
        $ambulances->user_id =  Auth::user()->id; 

        $ambulances->save();


        toast('Your Order has been submited!','success');

        return redirect()->route('ambulance.orders');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function show(Ambulance $ambulance)
    {
        $dash_settings = DashboardSettings::all();

        $ambulances = Ambulance::all();
        $mails = Mail::all();

        return view('admin.ambulance.show',compact('ambulances','dash_settings','mails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambulance $ambulance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambulance $ambulance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambulance $ambulance,$id)
    {
        $ambulances = Ambulance::findOrFail($id);

        $dash_settings = DashboardSettings::all();

        $mails = Mail::all();

        $ambulances->destroy($id);

        toast('Your Order has been Deleted!','success');


        return view('user.home',compact('ambulances','dash_settings','mails'));


    }

    public function orders(Request $request)
    {
        $userId = $request->user()->id;
        $ambulances = Ambulance::where('id', $userId)->get();
        return view('user.ambulance.ambulance_order',compact('ambulances'));

    }

}
