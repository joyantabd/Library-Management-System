<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Support\Carbon;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
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
            'name' =>'required',
            'photo' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/book'))
            {
                mkdir('uploads/book', 0777 , true);
            }
            $image->move('uploads/book',$imagename);
        }else {
            $imagename = 'default.png';
        }
        $book = new Book();
        $book->name =$request->name;
        $book->writer =$request->writer;
        $book->image = $imagename;
        $book->edition =$request->edition;
        $book->isbn =$request->isbn;
        $book->publication =$request->publication;
        $book->status =$request->status;
        $book->save();
        return redirect()->route('book.index')->with('successMsg','A New Book has been Added Successfully !!!');
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
        $book = Book::find($id);
        return view('admin.book.edit',compact('book'));
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
            'name' => 'required',

        ]);
        $book = Book::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/book'))
            {
                mkdir('uploads/book',0777,true);
            }
            unlink('uploads/book/'.$book->image);
            $image->move('uploads/book',$imagename);
        }else{
            $imagename = $book->image;
        }

        $book->name =$request->name;
        $book->writer =$request->writer;
        $book->image = $imagename;
        $book->edition =$request->edition;
        $book->isbn =$request->isbn;
        $book->publication =$request->publication;

        $book->save();
        return redirect()->route('book.index')->with('successMsg','Book Info Successfully Updated');
    }

    public function update1(Request $request, $id)
    {
        $book = Book::find($id);
        if (!is_null($book)) {
            $book->status = $request->status;
            $book->save();
        }else {
            return redirect()->route('book.index');
        }
        return back()->with('successMsg','Book Status Info Successfully Updated !!! Now you can issue the Book!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->back()->with('successMsg','Book successfully Deleted !!!');
    }
}
