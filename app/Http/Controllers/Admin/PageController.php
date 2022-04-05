<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Redirect;
use File;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $allPage = Page::all();
       return view('admin/page/view', compact('allPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/page/add');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
       if ($files = $request->file('image')) {
           $destinationPath = 'uploads/page'; // upload path
           $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
           if(!empty($profilefile))
           {
           $files->move($destinationPath, $profilefile);
           }
        }
        $p_name = $request->input('p_name');
        $p_slug = $request->input('p_slug');
        $description = $request->input('description');
        $status = $request->input('status');
        $add = new Page();
        $add->p_name = $p_name;
        $add->p_slug = $p_slug;
        $add->description = $description;
        $add->status = $status;
        if(!empty($profilefile))
        {
        $add->image = $profilefile;
        }
        $add->save();
        return Redirect::back()->with('success','Page Added Successfully.');
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
        $editPage = Page::where('id', $id)->get();

      return view('admin/page/edit', compact('editPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request)
    {
       if ($files = $request->file('image')) {
           $destinationPath = 'uploads/page'; // upload path
           $profilefile = date('YmdHis') . "." . $files->getClientOriginalExtension();
           if(!empty($profilefile))
           {
           $files->move($destinationPath, $profilefile);
           }
        }
        $id = $request->input('id');
        $p_name = $request->input('p_name');
        $p_slug = $request->input('p_slug');
        $description = $request->input('description');
        $status = $request->input('status');
        $update = Page::find($id);
        $update->p_name = $p_name;
        $update->p_slug = $p_slug;
        $update->description = $description;
        $update->status = $status;
        if(!empty($profilefile))
        {
        $update->image = $profilefile;
        }
        $update->save();
        return Redirect::back()->with('success','Page Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $image = Page::find($id);
      $path = public_path('uploads/page/'.$image->image);
      $isExists = File::exists($path);
      if($isExists == '1' && $image->image != '')
      {
       unlink('uploads/page/'.$image->image); 
      }
      Page::where('id',$id)->delete();
      return redirect()->route('allPage')->with('delete', 'Page Deleted Successfully.');
    }
}
