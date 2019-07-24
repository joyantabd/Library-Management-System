<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Borrow;
use App\Faculty;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $borrows = Borrow::all();
       return view('admin.borrow.index',compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::where('status',true)->get();
        $facultys =Faculty::all();
        $students = Student::all();
        return view('admin.borrow.create',compact('books','facultys','students'));
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
            'book_name' =>'required',
        ]);
        $borrow = new Borrow();
        $borrow->book_name =$request->book_name;
        $borrow->faculty_name =$request->faculty_name;
        $borrow->student_name =$request->student_name;
        $borrow->save();
        return redirect()->route('borrow.index')->with('successMsg','A New Issue info has been Added Successfully !!!');
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
        $borrow = Borrow::find($id);
        $books = Book::all();
        $facultys = Faculty::all();
        $students = Student::all();
        return view('admin.borrow.edit',compact('borrow','books','facultys','students'));
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
            'book_name' =>'required',
        ]);

        $borrow = Borrow::find($id);
        $borrow->book_name = $request->book_name;
        $borrow->faculty_name = $request->faculty_name;
        $borrow->student_name = $request->student_name;
        $borrow->return_date = $request->return_date;
        $borrow->save();
        return redirect()->route('borrow.index')->with('successMsg','Existing Issue info has been Updated Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Borrow::find($id)->delete();
        return redirect()->back()->with('successMsg','Issue Info successfully Deleted !!!');
    }
}
