<?php

namespace App\Http\Controllers;

use App\Book;
use App\Location;
use App\Slider;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function index()
    {
        $books = Book::all();
        $locations = Location::all();
        $sliders = Slider::orderBy('priority', 'asc')->get();

        return view('welcome',compact('books','sliders','locations'));
    }
}
