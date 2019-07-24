<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Borrow;
use App\Faculty;
use App\Location;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $borrows =Borrow::all();
        $borrowCount = Borrow::count();
        $facultyCount = Faculty::count();
        $studentCount = Student::count();
        $books = Book::where('status',true)->get();
    return view('admin.dashboard',compact('bookCount','borrows','borrowCount','books','facultyCount','studentCount'));
    }
}
