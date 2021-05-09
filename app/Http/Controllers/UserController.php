<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Doctor;
use App\Admin;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Service;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        $patients = Patient::all();
        $doctors = Doctor::all();
        $admins = Admin::all();
        $dash_settings = DashboardSettings::all();

        return view('admin.users.list',compact('users','patients','doctors','admins','dash_settings'));

    }

    public function add_to_favorite($id){

        $service = Service::find($id);

        $favorite = session()->get('favourite');

        $favorite = [

            $id => [
                "title" => $service->title,
                "description" => $service->description,
                "icon" => $service->photo
            ]

        ];



    }
}
