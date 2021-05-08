<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DashboardSettings;
use App\WebsiteSettings;
use RealRashid\SweetAlert\Facades\Alert;


class SettingsController extends Controller
{
    public function dashboardSettings(){

        $dash_settings = DashboardSettings::all();

        return view('admin.settings.dashboard',compact('dash_settings'));

    }

    public function websiteSettings(){

        $dash_settings = DashboardSettings::all();

        return view('admin.settings.website',compact('dash_settings'));

    }

    public function editDashbaord(Request $request){

    
        $this->validate($request,[

            'dash_name' => 'required|sometimes',
            
            'dash_image' => 'required|sometimes'

        ]); 
        

        $dash_settings = new DashboardSettings;

        $dash_settings->dash_name = $request->dash_name;

        $img_file = $request->dash_image;

        $new_image = time().$img_file->getClientOriginalName();

        $img_file->move('public/imgs/',$new_image);

        $dash_settings->dash_image = 'public/imgs/'.$new_image;


        $dash_settings->save();

        Alert::success('Success', 'Dashboard Edited Successfully !');


        return redirect()->route('admin.dashboard');
        

    }

    public function editWebsite(Request $request){

        $this->validate($request,[


            'website_name' => 'required|sometimes',
            'website_image' => 'required|sometimes',
            'about' => 'required|sometimes',

        ]);

        $websitesettings = new WebsiteSettings;

        $websitesettings->website_name = $request->website_name;
        $websitesettings->about = $request->about;


        $img_file = $request->website_image;

        $new_image = time().$img_file->getClientOriginalName();

        $img_file->move('public/imgs/',$new_image);

        $websitesettings->website_image = 'public/imgs/'.$new_image;

        $websitesettings->save();

        Alert::success('Success', 'Website Edited Successfully !');

        return redirect()->back();

    }
}
