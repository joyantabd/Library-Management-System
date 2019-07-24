<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Compound;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create');
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
            'photo' => 'required|mimes:jpeg,jpg,bmp,png',
            'phone' => 'required',
            'nationality' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
        ]);
        $photo = $request->file('photo');
        $slug = str_slug($request->name);
        if (isset($photo))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $photo->getClientOriginalExtension();
            if (!file_exists('uploads/student'))
            {
                mkdir('uploads/student', 0777 , true);
            }
            $photo->move('uploads/student',$imagename);
        }else {
            $imagename = 'default.png';
        }

        $students = new Student();
        $students->name = $request->name;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->nationality = $request->nationality;
        $students->dob = $request->dob;
        $students->gender = $request->gender;
        $students->blood = $request->blood;
        $students->f_name = $request->f_name;
        $students->f_phone = $request->f_phone;
        $students->f_occupation = $request->f_occupation;
        $students->m_name = $request->m_name;
        $students->m_phone = $request->m_phone;
        $students->m_occupation = $request->m_occupation;
        $students->present_address = $request->present_address;
        $students->permanent_address = $request->permanent_address;

        $students->photo = $imagename;
        $students->save();
        return redirect()->route('student.index')->with('successMsg',' A Student  info Successfully Added !!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::find($id);
        return view('admin.student.show',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::find($id);
        return view('admin.student.edit',compact('students'));
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
            'phone' => 'required',
            'nationality' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
        ]);
        $students = Student::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/student'))
            {
                mkdir('uploads/student',0777,true);
            }
            unlink('uploads/student/'.$students->image);
            $image->move('uploads/student',$imagename);
        }else{
            $imagename = $students->image;
        }
        $students->name = $request->name;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->nationality = $request->nationality;
        $students->dob = $request->dob;
        $students->gender = $request->gender;
        $students->blood = $request->blood;
        $students->f_name = $request->f_name;
        $students->f_phone = $request->f_phone;
        $students->f_occupation = $request->f_occupation;
        $students->m_name = $request->m_name;
        $students->m_phone = $request->m_phone;
        $students->m_occupation = $request->m_occupation;
        $students->present_address = $request->present_address;
        $students->permanent_address = $request->permanent_address;

        $students->photo = $imagename;
        $students->save();
        return redirect()->route('student.index')->with('successMsg',' A Student  info Successfully Added !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect()->back();
    }
}
