<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use Redirect;
use File;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $allTestimonial = Testimonial::all();
       return view('admin/testimonial/view', compact('allTestimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin/testimonial/add');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        if ($files = $request->file('image')) {
           $destinationPath = 'uploads/testimonial'; // upload path
           $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
           if(!empty($profilefile))
           {
           $files->move($destinationPath, $profilefile);
           }
        }
        $name = $request->input('name');
        $author_name = $request->input('author_name');
        $description = $request->input('description');
        $status = $request->input('status');
        $add = new Testimonial();
        $add->name = $name;
        $add->author_name = $author_name;
        $add->description = $description;
        $add->status = $status;
        if(!empty($profilefile))
        {
        $add->image = $profilefile;
        }
        $add->save();
        return Redirect::back()->with('success','Testimonial Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $editTestimonial = Testimonial::where('id', $id)->get();

      return view('admin/testimonial/edit', compact('editTestimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        //DB::enableQueryLog();
         if ($files = $request->file('image')) {
           $destinationPath = 'uploads/testimonial'; // upload path
           $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
           if(!empty($profilefile))
           {
           $files->move($destinationPath, $profilefile);
           }
        }
        $id = $request->input('id');
        $name = $request->input('name');
        $author_name = $request->input('author_name');
        $description = $request->input('description');
        $status = $request->input('status');
        $update = Testimonial::find($id);
        $update->name = $name;
        $update->author_name = $author_name;
        $update->description = $description;
        $update->status = $status;
        if(!empty($profilefile))
        {
        $update->image = $profilefile;
        }
        $update->save();
       // $query = DB::getQueryLog();
        //$query = end($query);
       // dd($query);
       // return redirect()->route('testimonial/edit/'.$id)->with('success', 'Testimonial Updated Successfully.');
        return Redirect::back()->with('success','Testimonial Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $image = Testimonial::find($id);
      $path = public_path('uploads/testimonial/'.$image->image);
      $isExists = File::exists($path);
      if($isExists == '1' && $image->image != '')
      {
       unlink('uploads/testimonial/'.$image->image); 
      }
      
      Testimonial::where('id',$id)->delete();
      return redirect()->route('allTestimonial')->with('delete', 'Testimonial Deleted Successfully.');

    }
}
