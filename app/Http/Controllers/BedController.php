<?php

namespace App\Http\Controllers;

use App\Bed;
use Illuminate\Http\Request;
use App\User;
use App\DashboardSettings;
use App\Mail;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BedController extends Controller
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
        return view('user.beds.bed_request');

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

            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'city' => 'required',
            'age' => 'required',
            'gender' => 'required',            

        ]);

        $beds = new Bed;

        $beds->name = $request->name;    
        $beds->email = $request->email;    
        $beds->phone_number = $request->phone_number;    
        $beds->country = $request->country;    
        $beds->city = $request->city;    
        $beds->gender = $request->gender;  
        $beds->age = $request->age;
        $beds->user_id =  Auth::user()->id; 
        $beds->status = false;
  
        
        $beds->save();


        toast('Your Bed Request has been submited!','success');

        return redirect('user.home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function show(Bed $bed)
    {
        $dash_settings = DashboardSettings::all();

        $beds = Bed::where('status',1)->latest()->get();

        $mails = Mail::all();

        return view('admin.bed.show',compact('beds','dash_settings','mails'));
    }

    public function pending_beds(){

        $dash_settings = DashboardSettings::all();

        $beds = Bed::where('status',0)->latest()->get();

        $mails = Mail::all();

        return view('admin.bed.pending',compact('beds','dash_settings','mails'));        

    }

    public function approve_beds_request($id){

        $mails = Mail::all();
        $dash_settings = DashboardSettings::all();

        $pending_beds = Bed::findOrFail($id);

        if($pending_beds->status == 0){

            $pending_beds->status = 1;

        }else{

            $pending_beds->status = 0;

        }

        $pending_beds->save();

        Alert::success('Success', 'Request Confirmed Successfully !');

        return redirect()->route('bed.show',compact('pending_beds','mails','dash_settings'))->with('Message', $pending_beds->user_id , 'Status has been changed Successfully');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function edit(Bed $bed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bed $bed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bed $bed,$id)
    {
        
        $beds = Bed::findOrFail($id);

        $beds->destroy($id);

        toast('Your Order has been Deleted!','success');


        return view('user.home',compact('beds','dash_settings','mails'));

    
    }

    public function orders(Request $request)
    {
        $userId = Auth::id();
        $beds = Bed::where('user_id',$userId)->get();


        return view('user.beds.orders',compact('beds'));

    }

}
