<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Department;
use App\DashboardSettings;
use App\Mail;
use RealRashid\SweetAlert\Facades\Alert;


class BlogController extends Controller
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
        $blogs = Blog::all();

        return view('admin.blog.show',compact('doctors','dash_settings','departments','mails','blogs'));
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

        return view('admin.blog.create',compact('doctors','dash_settings','departments','mails'));

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
            'image' => 'required',
            'description' => 'required',
            'tags' => 'required',


        ]);

        $posts = new Blog;

        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->tags = $request->tags;

        
        $img_file = $request->image;

        $new_image = time().$img_file->getClientOriginalName();

        $img_file->move('public/imgs/',$new_image);

        $posts->image = 'public/imgs/'.$new_image;

        $posts->save();

        Alert::success('Success', 'Post Added Successfully !');


        return redirect()->route('blog.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog,$id)
    {
        $blog = Blog::findOrFail($id);
        $departments = Department::all();
        $dash_settings = DashboardSettings::all();
        $mails = Mail::all();

        return view('admin.blog.edit',compact('doctors','dash_settings','departments','mails','blog'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog , $id)
    {
        
        $this->validate($request,[

            'title' => 'required',
            'image' => 'required',
            'description' => 'required',


        ]);

        $blog = Blog::findOrFail($id);


        if($request->has('image')){


            $img_file = $request->image;
    
            $new_image = time().$img_file->getClientOriginalName();
    
            $img_file->move('public/imgs/',$new_image);
    
            $blog->image = 'public/imgs/'.$new_image;

            $update_blog =[

                "title" => $request->title,
                "description" => $request->description,
                "tags" => $request->tags,
                "image" => 'public/imgs/'.$new_image,

            ];

        }else{


            $update_blog =[

                "title" => $request->title,
                "description" => $request->description,
                "image" => 'public/imgs/'.$new_image,
                "tags" => $request->tags,

            ];

        }
        

        $blog->update($update_blog);



        $blog->save();

        Alert::success('Success', 'Blog Edited Successfully !');


        return redirect()->route('blog.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog,$id)
    {
        $blog = Blog::findOrFail($id);

        $blog->destroy($id);

        Alert::error('Success', 'Blog Deleted Successfully !');


        return redirect()->route('blog.show');
    }

    public function single_blog($id){

        $dash_settings = DashboardSettings::all();

        $mails  = Mail::all();

        $blogs  = Blog::where('id',$id)->get();


        return view('admin.blog.single_blog',compact('dash_settings','mails','blogs'));

    }


}
