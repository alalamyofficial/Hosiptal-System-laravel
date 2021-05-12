<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Service;
use App\Doctor;
use Shetabit\Visitor\Traits\Visitor;
use App\Mail;


class MainController extends Controller
{
    public function main(){

        $settings = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::first()->paginate(4);

        visitor()->visit();

        return view('welcome',compact('settings','services'));

    }

    public function contact_us(){

        return view('visitors.contact');

    }

    public function all_doctors(){

        $doctors = Doctor::all();

        return view('all_doctors',compact('doctors'));
    }

    public function about(){

        return view('about');
    }
}
