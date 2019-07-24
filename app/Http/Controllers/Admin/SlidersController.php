<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Compound;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
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
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $photo = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($photo))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $photo->getClientOriginalExtension();
            if (!file_exists('uploads/sliders'))
            {
                mkdir('uploads/sliders', 0777 , true);
            }
            $photo->move('uploads/sliders',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $sliders = new Slider();
        $sliders->title = $request->title;
        $sliders->button_text = $request->button_text;
        $sliders->button_link = $request->button_link;
        $sliders->priority = $request->priority;
        $sliders->image = $imagename;
        $sliders->save();
        return redirect()->route('slider.index')->with('successMsg',' A Slider  info Successfully Added !!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.show',compact('sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.edit',compact('slider'));
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

        $sliders = Slider::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/sliders'))
            {
                mkdir('uploads/sliders',0777,true);
            }
            unlink('uploads/sliders/'.$sliders->image);
            $image->move('uploads/sliders',$imagename);
        }else{
            $imagename = $sliders->image;
        }
        $sliders->title = $request->title;
        $sliders->button_text = $request->button_text;
        $sliders->button_link = $request->button_link;
        $sliders->priority = $request->priority;
        $sliders->image = $imagename;
        $sliders->save();
        return redirect()->route('slider.index')->with('successMsg','Existing Slider info Successfully Added !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();
        return redirect()->back();
    }
}
