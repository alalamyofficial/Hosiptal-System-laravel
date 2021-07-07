<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use App\Department;
use App\DashboardSettings;
use App\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();
        $reports = Report::all();

        return view('admin.report.show',compact('dash_settings','departments','mails','reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        return view('admin.report.create',compact('doctors','dash_settings','departments','mails'));
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

            'title' => 'required',
            'image' => 'sometimes',
            'bio' => 'required',
            'type' => 'required',


        ]);

        $reports = new Report;

        $reports->title = $request->title;
        $reports->bio = $request->bio;
        $reports->type = $request->type;

        
        $img_file = $request->image;

        $new_image = time().$img_file->getClientOriginalName();

        $img_file->move('public/imgs/',$new_image);

        $reports->image = 'public/imgs/'.$new_image;

        $reports->save();

        Alert::success('Success', 'Report Added Successfully !');


        return redirect()->route('report.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report,$id)
    {
        $report = Report::findOrFail($id);
        $departments = Department::all();
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        return view('admin.report.edit',compact('dash_settings','departments','mails','report'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report,$id)
    {
        $this->validate($request,[

            'title' => 'required',
            'image' => 'sometimes',
            'bio' => 'required',
            'type' => 'required',


        ]);

        $report = Report::findOrFail($id);


        if($request->has('image')){


            $img_file = $request->image;
    
            $new_image = time().$img_file->getClientOriginalName();
    
            $img_file->move('public/imgs/',$new_image);
    
            $blog->image = 'public/imgs/'.$new_image;

            $update_report =[

                "title" => $request->title,
                "bio" => $request->bio,
                "type" => $request->type,
                "image" => 'public/imgs/'.$new_image,

            ];

        }else{


            $update_report =[

                "title" => $request->title,
                "bio" => $request->bio,
                "image" => 'public/imgs/'.$new_image,
                "type" => $request->type,

            ];

        }
        

        $report->update($update_report);



        $update_report->save();

        Alert::success('Success', 'Report Edited Successfully !');


        return redirect()->route('report.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report,$id)
    {
        $report = Report::findOrFail($id);

        $report->destroy($id);

        Alert::error('Success', 'Report Deleted Successfully !');


        return redirect()->route('report.show');
    }

    public function single_report($id){

        $dash_settings = DashboardSettings::all();

        $mails  = Mail::all();

        $reports  = Report::where('id',$id)->get();


        return view('admin.report.single_report',compact('dash_settings','mails','reports'));

    }

}
