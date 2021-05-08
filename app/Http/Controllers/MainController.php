<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Service;

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

        return view('all_doctors');
    }
}
