<?php

namespace App\Http\Controllers\Admin;

use App\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();
        return view('admin.faculty.index',compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculty.create');
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
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
            'designation' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/faculty'))
            {
                mkdir('uploads/faculty', 0777 , true);
            }
            $image->move('uploads/faculty',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $faculty = new Faculty();
        $faculty->name = $request->name;
        $faculty->image = $imagename;
        $faculty->designation =$request->designation;
        $faculty->email =$request->email;
        $faculty->phone =$request->phone;
        $faculty->address =$request->address;
        $faculty->save();
        return redirect()->route('faculty.index')->with('successMsg',' New Faculty Information Successfully Saved !!!');

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
        $faculty = Faculty::find($id);
        return view('admin.faculty.edit',compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faculty = Faculty::find($id);
        $this->validate($request,[
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $faculty = Faculty::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/faculty'))
            {
                mkdir('uploads/faculty',0777,true);
            }
            unlink('uploads/faculty/'.$faculty->image);
            $image->move('uploads/faculty',$imagename);
        }else{
            $imagename = $faculty->image;
        }


        $faculty->name = $request->name;
        $faculty->image = $imagename;
        $faculty->designation = $request->designation;
        $faculty->email = $request->email;
        $faculty->phone = $request->phone;
        $faculty->address = $request->address;
        $faculty->save();
        return redirect()->route('faculty.index')->with('successMsg','Existing Faculty Information Successfully Updated !!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::find($id);
        if(file_exists('uploads/faculty/'.$faculty->image))
        {

            unlink('uploads/faculty/'.$faculty->image);
        }

        $faculty->delete();
        return redirect()->back()->with('successMsg','Faculty Information Deleted Successfully !!!');
    }
}
