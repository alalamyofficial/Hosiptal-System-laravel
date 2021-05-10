<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\DashboardSettings;

class MailController extends Controller
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
        return view('visitors.contact');
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

            'message' => 'required',
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',

        ]);

        $mails = new Mail;

        $mails->message = $request->message;
        $mails->name = $request->name;
        $mails->email = $request->email;
        $mails->subject = $request->subject;

        $mails->save();

        Alert::success('Success', 'Message Sent Successfully !');


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {
        $dash_settings = DashboardSettings::all();

        $mails  = Mail::orderBy('id','desc')->paginate(5);

        return view('admin.mails.show',compact('dash_settings','mails'));
    }

    public function content($id)
    {
        $dash_settings = DashboardSettings::all();

        // $mails  = Mail::findOrFail($id);
        $mails  = Mail::where('id',$id)->get();


        return view('admin.mails.content',compact('dash_settings','mails'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
