<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Visitor\Traits\Visitor;


class TestController extends Controller
{
    public function test(Request $request){

        // $ip = '103.239.147.187'; //For static IP address get
        // //$ip = request()->ip(); //Dynamic IP address get
        // $data = \Location::get($ip);                
        // return $data;
    
        // $userIp = '103.239.147.187';
        // $userIp = request()->ip();

        // $locationData = \Location::get($userIp);
        
        // dd($locationData);
        // return $locationData;

        
        // $request->visitor()->browser();   
        visitor()->visit(); // create a visit log

    
    }
}
