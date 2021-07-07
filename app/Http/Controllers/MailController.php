<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Service;
use App\Department;
use App\Drug;
use App\Notifications\Mails;
use Notification;
use Illuminate\Notifications\Notifiable;
use App\User;
use App\Mail\AdminMail;

class MailController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::orderBy('id', 'desc')->paginate(4);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);
        $drugs  = Drug::orderBy('id', 'desc')->paginate(5);

        return view('visitors.contact',compact('settings','services','departments','drugs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mail_noty = Mail::all();

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

        Notification::send($mail_noty , new Mails($request->name , $request->message));

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


    public function destroy(Mail $mail)
    {
        //
    }

    public function contact_form(){

        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        
        return view('admin.mails.contact',compact('dash_settings','mails'));
    }

    public function send_mails(Request $request){

        $contact_form_data = array(
            'name'      =>  $request->name,
            'email'      =>  $request->email,
            'subject'      =>  $request->subject,
            'message'   =>   $request->message
        );

        \Mail::to('theories619@gmail.com')->send(new AdminMail($contact_form_data));

        return redirect()->back();

    }

}
