<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Student;
use App\Models\Track;
use Illuminate\Support\Facades\Auth;



class StudentController extends Controller
{
    //

    function __construct(){
//        $this->middleware('auth')->only(['store', 'update', 'destroy']);
//        $this->middleware('auth')->except(['index', 'show']);
    }

    function  index(){
        # this function select * from students table;
        /**
            geT DATA using eloquent models
         */

       dump(Auth::user());
       dump(Auth::id());
        $students = Student::all();  # Eloquent orm
//        return $students;
        return view('students.index', ['students'=>$students]);
    }

    function  index_db(){

        $students=  DB::table('students')->get();
//        return $students;
        return view('students.index', ['students'=>$students]);
    }


    function show($id){
//        $student = Student::find($id);
        $student = Student::findorfail($id);
//        dd($student);  # dump + exit --> stop execution after displaying content
        return view('students.show', ["student"=>$student]);
    }


    # create

    function  create(){

        $tracks = Track::all();
        return view('students.create',['tracks'=>$tracks]);

    }

    function store()
    {

        # validate data in backend

        \request()->validate([

            "name"=>"required|min:5",
            "email"=>"required|unique:students"
        ],[
            "name.required"=>"Student name is required",
            'name.min'=>'Student name must be at least 5 chars.'
        ]);

//        $name = \request()->get('name');
//        $email = \request()->get('email');
//        $grade = \request()->get('grade');
//        $image = \request()->get('image');
//        $track_id = \request()->get('track_id');
//        $student = new Student();
//        $student->name= $name;
//        $student->email = $email;
//        $student->image= $image;
//        $student->grade = $grade;
//        $student->track_id = $track_id;
//        $student->save();
        $requestdata = \request()->all();
        $requestdata['creator_id'] = Auth::id();

        $student=Student::create($requestdata);

        return to_route('students.show', $student->id);

    }






    # delete
    function destroy( $id)
    {
        $student = Student::findorfail($id);
        $student->delete();
//        return 'deleted';
        return to_route('students.index');
    }


    # edit

}
