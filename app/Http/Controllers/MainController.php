<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Service;
use App\Doctor;

class MainController extends Controller
{
    public function main(){

        $settings = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::first()->paginate(4);

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
