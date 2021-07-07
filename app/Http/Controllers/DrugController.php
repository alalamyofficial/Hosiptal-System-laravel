<?php

namespace App\Http\Controllers;

use App\Drug;
use Illuminate\Http\Request;
use App\DashboardSettings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail;


class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails  = Mail::all();

        $drugs  = Drug::orderBy('id', 'DESC')->get();

        $dash_settings = DashboardSettings::all();

        return view('admin.drugs.show',compact('drugs','dash_settings','mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mails  = Mail::all();

        $dash_settings = DashboardSettings::all();

        return view('admin.drugs.create',compact('dash_settings','mails'));
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
            
            'name' => 'required|string',
            'image' => 'required',
            'category' => 'required',
            'bio' => 'required',


        ]);

        $drugs = new Drug;

        $drugs->name = $request->name;
        $drugs->category = $request->category;
        $drugs->bio = $request->bio;



        $img_file = $request->image;

        $new_image = time().$img_file->getClientOriginalName();

        $img_file->move('public/imgs/',$new_image);

        $drugs->image = 'public/imgs/'.$new_image;




        $drugs->save();

        Alert::success('Success', 'Drug Added Successfully !');


        return redirect()->route('drug.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function show(Drug $drug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function edit(Drug $drug, $id)
    {
        $drug = Drug::findOrFail($id);

        $mails  = Mail::all();

        $dash_settings = DashboardSettings::all();

        return view('admin.drugs.edit',compact('drug','dash_settings','mails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drug $drug , $id)
    {
        $this->validate($request,[
            
            'name' => 'required|string',
            'image' => 'required',
            'category' => 'required',
            'bio' => 'required',


        ]);

        $drug = Drug::findOrFail($id);


        if($request->has('image')){


            $img_file = $request->image;
    
            $new_image = time().$img_file->getClientOriginalName();
    
            $img_file->move('public/imgs/',$new_image);
    
            $drug->image = 'public/imgs/'.$new_image;

            $update_drug =[

                "name" => $request->name,
                "category" => $request->category,
                "bio" => $request->bio,
                "image" => 'public/imgs/'.$new_image,

            ];

        }else{


            $update_drug =[

                "name" => $request->name,
                "category" => $request->category,
                "bio" => $request->bio,
                
            ];

        }
        

        $drug->update($update_drug);



        $drug->save();

        Alert::success('Success', 'Drug Edited Successfully !');


        return redirect()->route('drug.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug,$id)
    {
        $drug = Drug::findOrFail($id);

        $drug->destroy($id);

        Alert::error('Success', 'Drug Deleted Successfully !');


        return redirect()->route('drug.show');
    }
}
