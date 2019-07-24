<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('admin.location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view('admin.location.create',compact('books'));
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
            'room_no' =>'required',
            'self_no' =>'required',
            'column_no' =>'required',
            'row_no' =>'required',


        ]);
        $location = new Location();
        $location->book_id =$request->book_id;
        $location->room_no =$request->room_no;
        $location->self_no =$request->self_no;
        $location->column_no =$request->column_no;
        $location->row_no =$request->row_no;
        $location->save();
        return redirect()->route('location.index')->with('successMsg','A New Location has been Added Successfully !!!');
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
        $books = Book::all();
        $location = Location::find($id);
        return view('admin.location.edit',compact('location','books'));
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
        $this->validate($request,[
            'room_no' =>'required',
            'self_no' =>'required',
            'column_no' =>'required',
            'row_no' =>'required',
        ]);
        $location = Location::find($id);
        $location->book_id =$request->book_id;
        $location->room_no =$request->room_no;
        $location->self_no =$request->self_no;
        $location->column_no =$request->column_no;
        $location->row_no =$request->row_no;
        $location->save();
        return redirect()->route('location.index')->with('successMsg','Location Info Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::find($id)->delete();
        return redirect()->back()->with('successMsg','Location successfully Deleted !!!');
    }
}
