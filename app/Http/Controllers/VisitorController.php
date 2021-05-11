<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Visitor\Traits\Visitor;
use App\DashboardSettings;
use App\Mail;

class VisitorController extends Controller
{
    public function my_visitors(){


        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();
        // $myvisits = Visit::all();
        return view('admin.visitors.view',compact('dash_settings','mails'));
        // dd($myvisits);
    }
}
