<?php

namespace App\Http\Controllers;

use App\Vaccine;
use Illuminate\Http\Request;
use App\User;
use App\DashboardSettings;
use App\Mail;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;


class VaccineController extends Controller
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
        return view('user.vaccine.vaccine_request');
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

        $vaccines = new Vaccine;

        $vaccines->name = $request->name;    
        $vaccines->email = $request->email;    
        $vaccines->phone_number = $request->phone_number;    
        $vaccines->country = $request->country;    
        $vaccines->city = $request->city;    
        $vaccines->gender = $request->gender;  
        $vaccines->age = $request->age;
        $vaccines->user_id =  Auth::user()->id; 
        $vaccines->status = false;
  
        
        $vaccines->save();


        toast('Your Order has been submited!','success');

        return redirect()->route('user.vaccine.orders');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccine $vaccine)
    {
        $dash_settings = DashboardSettings::all();

        $vaccines = Vaccine::where('status',1)->latest()->get();

        $mails = Mail::all();

        return view('admin.vaccine.show',compact('vaccines','dash_settings','mails'));

    }

    public function pending_vaccines(){

        $dash_settings = DashboardSettings::all();

        $vaccines = Vaccine::where('status',0)->latest()->get();

        $mails = Mail::all();

        return view('admin.vaccine.pending',compact('vaccines','dash_settings','mails'));        

    }

    public function approve_vaccine_request($id){

        $mails = Mail::all();
        $dash_settings = DashboardSettings::all();

        $pending_vaccines = Vaccine::findOrFail($id);

        if($pending_vaccines->status == 0){

            $pending_vaccines->status = 1;

        }else{

            $pending_vaccines->status = 0;

        }

        $pending_vaccines->save();

        Alert::success('Success', 'Request Confirmed Successfully !');

        return redirect()->route('vaccine.show',compact('pending_vaccines','mails','dash_settings'))->with('Message', $pending_vaccines->user_id , 'Status has been changed Successfully');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaccine $vaccine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccine $vaccine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vaccine  $vaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccine $vaccine,$id)
    {
        $vaccines = Vaccine::findOrFail($id);

        $vaccines->destroy($id);

        toast('Your Order has been Deleted!','success');


        return view('user.home',compact('vaccines','dash_settings','mails'));
    }
    
    public function orders(Request $request)
    {
        $userId = Auth::id();
        $vaccines = Vaccine::where('user_id',$userId)->get();


        return view('user.vaccine.orders',compact('vaccines'));

    }

}
