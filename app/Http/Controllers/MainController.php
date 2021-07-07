<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DashboardSettings;
use App\WebsiteSettings;
use App\Service;
use App\Doctor;
use Shetabit\Visitor\Traits\Visitor;
use App\Mail;
use App\Blog;
use App\Drug;
use App\Department;

class MainController extends Controller
{
    public function main(){

        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::orderBy('id', 'desc')->paginate(4);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);
        $drugs  = Drug::orderBy('id', 'desc')->paginate(5);

        visitor()->visit();

        return view('welcome',compact('settings','services','departments','drugs'));


    }

    public function contact_us(){

        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::orderBy('id', 'desc')->paginate(4);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);
        $drugs  = Drug::orderBy('id', 'desc')->paginate(5);

        visitor()->visit();


        return view('visitors.contact',compact('settings','services','departments','drugs'));

    }

    
    public function about(){
        
        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::orderBy('id', 'desc')->paginate(4);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);
        $drugs  = Drug::orderBy('id', 'desc')->paginate(5);

        visitor()->visit();

        return view('visiors.about',compact('settings','services','departments','drugs'));
    }


    //for doctors
    public function all_doctors(){

        $doctors = Doctor::all();

        visitor()->visit();


        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::orderBy('id', 'desc')->paginate(4);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);
        $drugs  = Drug::orderBy('id', 'desc')->paginate(5);

        return view('visitors.doctors.all_doctors',compact('settings','services','departments','drugs','doctors'));
    }

    public function single_doctor($id){

        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::orderBy('id', 'desc')->paginate(4);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);
        $drugs  = Drug::orderBy('id', 'desc')->paginate(5);

        $doctors = Doctor::where('id',$id)->get();

        visitor()->visit();


        return view('visitors.doctors.single_doctor',compact('settings','services','departments','drugs','doctors'));
    }

    

    //for services
    public function all_services(){

        $services = Service::all();

        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);
        $drugs  = Drug::orderBy('id', 'desc')->paginate(5);

        visitor()->visit();


        return view('visitors.services',compact('services','settings','departments'));
    }




    //for drugs

    public function all_drugs(){

        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::orderBy('id', 'desc')->paginate(4);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);
        $drugs = Drug::all();

        visitor()->visit();


        return view('visitors.drugs.all_drugs',compact('drugs','settings','services','departments'));
    }

    public function single_drug($id){

        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::orderBy('id', 'desc')->paginate(4);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);

        $drugs = Drug::where('id',$id)->get();

        visitor()->visit();


        return view('visitors.drugs.single_drug',compact('drugs','settings','services','departments'));
    }


    //for blog
    public function publicBlog(){

        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::orderBy('id', 'desc')->paginate(4);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);

        $posts = Blog::all();

        visitor()->visit();


        return view('visitors.blog',compact('settings','services','departments','drugs','posts'));

    }

    public function singleBlog($id){


        $settings  = WebsiteSettings::orderBy('id', 'desc')->paginate(1);
        $services  = Service::orderBy('id', 'desc')->paginate(4);
        $departments  = Department::orderBy('id', 'desc')->paginate(5);

        $posts  = Blog::where('id',$id)->get();

        visitor()->visit();


        return view('visitors.single_blog',compact('posts','settings','services','departments','posts'));

    }
    

}
